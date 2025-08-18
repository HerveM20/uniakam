<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'matricule',
        'filiere',
        'role', // AJOUT 1 : Pour autoriser la modification du rôle plus tard
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // AJOUT 2 : La méthode manquante pour générer les initiales
    /**
     * Génère les initiales de l'utilisateur à partir de son nom complet.
     *
     * @return string
     */
    public function initials(): string
    {
        $words = explode(' ', $this->name);
        $initials = '';

        if (count($words) >= 2) {
            // Prend la première lettre des deux premiers mots
            $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        } elseif (count($words) === 1 && strlen($this->name) > 1) {
            // Si un seul mot, prend les deux premières lettres
            $initials = strtoupper(substr($this->name, 0, 2));
        } elseif (strlen($this->name) === 1) {
            // Si le nom n'a qu'une seule lettre
            $initials = strtoupper($this->name);
        }

        return $initials;
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}