<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'prix',
        'quantite',
        'image_url'
    ];

    /**
     * Obtenir l'utilisateur qui a créé le produit.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtenir les détails de commande pour ce produit.
     */
    public function commandeDetails(): HasMany
    {
        return $this->hasMany(CommandeDetails::class, 'produits_id');
    }

    /**
     * Obtenir les commandes qui contiennent ce produit.
     */
    public function commandes(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class, 'commande_details', 'produits_id', 'commandes_id')
                    ->withPivot('quantite', 'prix')
                    ->withTimestamps();
    }
}
