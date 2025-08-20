<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $matricule = ''; // AJOUTER CETTE LIGNE
    public string $filiere = '';   // AJOUTER CETTE LIGNE
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Gère la soumission du formulaire d'inscription.
     */
    public function register(): void
    {
        // AJOUTER les règles de validation pour les nouveaux champs
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'matricule' => ['required', 'string', 'max:50', 'unique:'.User::class], // unique: Empêche les doublons
            'filiere' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Le hashage du mot de passe est géré automatiquement si vous avez
        // un mutateur dans le modèle User. Sinon, on le fait ici.
        $validated['password'] = Hash::make($validated['password']);

        // Création de l'utilisateur avec toutes les données validées
        $user = User::create($validated);

        event(new Registered($user));

        Auth::login($user, true);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}