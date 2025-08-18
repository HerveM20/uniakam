<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Importez la classe de relation

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * C'est une liste blanche des colonnes que l'on peut remplir via un formulaire.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'titre',
        'type',
        'matiere',
        'promotion',
        'fichier_path',
        'fichier_nom_original',
    ];

    /**
     * Définit la relation inverse "appartient-à".
     * Un document appartient à un utilisateur.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}