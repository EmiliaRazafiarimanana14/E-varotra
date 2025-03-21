<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Facture extends Model
{
    use HasFactory;

    protected $table = 'facture';  // Spécifier le nom de la table au singulier

    protected $fillable = [
        'commandes_id',
        'payment_mode',
        'etat',
        'transaction_id'
    ];

    /**
     * Obtenir la commande associée à cette facture.
     */
    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class, 'commandes_id');
    }
}
