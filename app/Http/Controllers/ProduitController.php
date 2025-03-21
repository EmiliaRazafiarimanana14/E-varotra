<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Afficher la liste des produits
     */
    // public function index()
    // {
    //     $produits = Produit::latest()->paginate(10);
    //     return view('produits.index', compact('produits'));
    // }

    /**
     * Afficher le formulaire d'ajout d'un produit
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Enregistrer un nouveau produit
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'quantite' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        // Gestion de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('produits', $imageName, 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        // Attribution automatique de l'ID de l'utilisateur connecté
        $data['user_id'] = Auth::id();

        Produit::create($data);

        return redirect()->route('produits.index')
            ->with('success', 'Produit ajouté avec succès!');
    }

    /**
     * Afficher un produit spécifique
     */
    public function show(Produit $produit)
    {
        $produit = Produit::latest()->paginate(10);
        return view('client.produits', compact('produit'));
    }

    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    /**
     * Ajoute un produit au panier
     */
    public function addToCart(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            $cart[$id]['quantite']++;
        } else {
            $cart[$id] = [
                "id" => $produit->id,
                "name" => $produit->name,
                "quantite" => 1,
                "prix" => $produit->prix,
                "image_url" => $produit->image_url
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier!');
    }
    
    /**
     * Affiche le panier
     */
    public function cart()
    {
        return view('produits.cart');
    }
    
    /**
     * Vide le panier
     */
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Panier vidé avec succès!');
    }

    /**
     * Afficher le formulaire d'édition
     */
    // public function edit(Produit $produit)
    // {
    //     // Vérifier si l'utilisateur est autorisé à modifier ce produit
    //     $this->authorize('update', $produit);
        
    //     return view('produits.edit', compact('produit'));
    // }

    /**
     * Mettre à jour un produit
     */
    // public function update(Request $request, Produit $produit)
    // {
    //     // Vérifier si l'utilisateur est autorisé à modifier ce produit
    //     $this->authorize('update', $produit);

    //     $request->validate([
    //         'name' => 'required|string|max:200',
    //         'description' => 'nullable|string',
    //         'prix' => 'required|numeric|min:0',
    //         'quantite' => 'required|integer|min:0',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $data = $request->all();
        
    //     // Gestion de l'image
    //     if ($request->hasFile('image')) {
    //         // Supprimer l'ancienne image si elle existe
    //         if ($produit->image_url) {
    //             $oldPath = str_replace('/storage/', '', $produit->image_url);
    //             if (Storage::disk('public')->exists($oldPath)) {
    //                 Storage::disk('public')->delete($oldPath);
    //             }
    //         }
            
    //         // Enregistrer la nouvelle image
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $path = $image->storeAs('produits', $imageName, 'public');
    //         $data['image_url'] = '/storage/' . $path;
    //     }

    //     $produit->update($data);

    //     return redirect()->route('produits.index')
    //         ->with('success', 'Produit mis à jour avec succès!');
    // }

    /**
     * Supprimer un produit
     */
    // public function destroy(Produit $produit)
    // {
    //     // Vérifier si l'utilisateur est autorisé à supprimer ce produit
    //     $this->authorize('delete', $produit);
        
    //     // Supprimer l'image si elle existe
    //     if ($produit->image_url) {
    //         $path = str_replace('/storage/', '', $produit->image_url);
    //         if (Storage::disk('public')->exists($path)) {
    //             Storage::disk('public')->delete($path);
    //         }
    //     }
        
    //     $produit->delete();

    //     return redirect()->route('produits.index')
    //         ->with('success', 'Produit supprimé avec succès!');
    // }
}