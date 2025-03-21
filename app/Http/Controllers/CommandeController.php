<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandeDetails;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    /**
     * Valider la commande à partir du panier
     */
    public function validerCommande(Request $request)
    {
        // Vérifier si le panier est vide
        if(!session()->has('cart') || count(session()->get('cart')) == 0) {
            return redirect()->back()->with('error', 'Votre panier est vide');
        }
        
        $cart = session()->get('cart');
        $total_prix = 0;
        
        // Calculer le prix total
        foreach($cart as $item) {
            $total_prix += $item['prix'] * $item['quantite'];
        }
        
        DB::beginTransaction();
        
        try {
            // Créer la commande
            $commande = Commande::create([
                'user_id' => Auth::id(),
                'total_prix' => $total_prix,
                'etat' => 'en attente'
            ]);
            
            // Ajouter les détails de la commande
            foreach($cart as $item) {
                CommandeDetails::create([
                    'commandes_id' => $commande->id,
                    'produits_id' => $item['id'],
                    'quantite' => $item['quantite'],
                    'prix' => $item['prix']
                ]);
                
                // Mettre à jour la quantité du produit
                $produit = Produit::find($item['id']);
                $produit->quantite -= $item['quantite'];
                $produit->save();
            }
            
            DB::commit();
            
            // Vider le panier
            session()->forget('cart');
            
            return redirect()->route('commandes.success', $commande->id)
                ->with('success', 'Votre commande a été enregistrée avec succès!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }
    
    /**
     * Affiche la page de succès
     */
    public function success($id)
    {
        $commande = Commande::with('commandeDetails.produit')->findOrFail($id);
        return view('commandes.success', compact('commande'));
    }
    
    /**
     * Liste des commandes de l'utilisateur
     */
    public function index()
    {
        $commandes = Commande::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('commandes.index', compact('commandes'));
    }
}