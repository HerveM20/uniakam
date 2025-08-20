<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Affiche la page du tableau de bord avec les statistiques.
     * C'est un contrôleur "invokable", appelé automatiquement.
     */
    public function __invoke(): View
    {
        // On initialise un tableau vide pour les statistiques.
        // C'est une bonne pratique pour s'assurer que la variable existe toujours.
        $stats = [];

        // On vérifie si l'utilisateur est connecté ET s'il a le rôle 'admin'.
        // C'est une sécurité et une optimisation : on ne fait des requêtes à la base de données que si c'est nécessaire.
        if (Auth::user() && Auth::user()->role === 'admin') {
            $stats = [
                'totalUsers' => User::count(),
                'totalStudents' => User::where('role', 'etudiant')->count(),
                'totalTeachers' => User::where('role', 'enseignant')->count(),
                'totalDocuments' => Document::count(),
            ];
        }

        // On passe les données (le tableau $stats) à la vue 'dashboard'.
        // La vue pourra maintenant accéder à ces données avec des variables comme $stats['totalUsers'].
        return view('dashboard', [
            'stats' => $stats,
        ]);
    }
}