<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View; // Importez la classe View

class UserController extends Controller
{
    /**
     * Affiche la page de gestion des utilisateurs.
     * Cette méthode retourne simplement la vue qui contient le composant Livewire.
     */
    public function index(): View
    {
        return view('livewire.user.index');
    }
}

