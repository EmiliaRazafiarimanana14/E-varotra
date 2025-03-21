<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommandeDetails extends Model
{
        use HasFactory;
    
        protected $fillable = [
            'commandes_id',
            'produits_id',
            'quantite',
            'prix'
        ];
    
        /**
         * Obtenir la commande associée à ce détail.
         */
        public function commande(): BelongsTo
        {
            return $this->belongsTo(Commande::class, 'commandes_id');
        }
    
        /**
         * Obtenir le produit associé à ce détail.
         */
        public function produit(): BelongsTo
        {
            return $this->belongsTo(Produit::class, 'produits_id');
        }
  
}
