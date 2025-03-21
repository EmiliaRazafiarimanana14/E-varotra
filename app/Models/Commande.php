<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_prix',
        'etat'
    ];

    /**
     * Obtenir l'utilisateur qui a passé la commande.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtenir les détails de la commande.
     */
    public function commandeDetails(): HasMany
    {
        return $this->hasMany(CommandeDetails::class, 'commandes_id');
    }

    /**
     * Obtenir les produits de cette commande.
     */
    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class, 'commande_details', 'commandes_id', 'produits_id')
                    ->withPivot('quantite', 'prix')
                    ->withTimestamps();
    }

    /**
     * Obtenir la facture associée à cette commande.
     */
    public function facture(): HasOne
    {
        return $this->hasOne(Facture::class, 'commandes_id');
    }
}
