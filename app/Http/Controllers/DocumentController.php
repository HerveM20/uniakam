<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DocumentController extends Controller
{
    /**
     * Affiche la page listant tous les documents.
     * Cette méthode retourne la vue "lanceur" qui appelle le composant Livewire.
     */
    public function index(): View
    {
        return view('documents.index');
    }

    /**
     * Affiche la page de téléversement de document.
     * Cette méthode retourne la vue "lanceur" qui appelle le composant Livewire.
     */
    public function upload(): View
    {
        return view('documents.upload'); // <-- CORRIGÉ ICI
    }
}