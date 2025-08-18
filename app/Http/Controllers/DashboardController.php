<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Affiche la page du tableau de bord.
     */
    public function __invoke(): View
    {
        return view('dashboard');
    }
}