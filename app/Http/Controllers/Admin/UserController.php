<?php

namespace App\Http\Controllers\Admin; // <-- CORRIGÉ ICI

use App\Http\Controllers\Controller; // <-- CORRIGÉ ICI
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Affiche la page de gestion des utilisateurs.
     */
    public function index(): View
    {
        // Retourne la vue "lanceur" qui se chargera d'appeler le composant Livewire.
        return view('admin.users.index'); 
    }
}