<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\View\View; // CORRECTION : C'est le chemin correct et standard
use Illuminate\Http\Request;

class SgacController extends Controller
{
    /**
     * Affiche le tableau de bord principal de l'espace de modération du SGAC.
     */
    public function dashboard(): View
    {
        // 1. Calculer les statistiques pour les cartes
        $stats = [
            'pending' => Document::where('status', 'pending')->count(),
            'approved_weekly' => Document::where('status', 'approved')->where('reviewed_at', '>=', now()->subWeek())->count(),
            'rejected_weekly' => Document::where('status', 'rejected')->where('reviewed_at', '>=', now()->subWeek())->count(),
        ];

        // 2. Récupérer la liste paginée des documents en attente
        $pendingDocuments = Document::with('user') // 'with('user')' est une optimisation pour charger l'auteur en 1 seule requête
            ->where('status', 'pending')
            ->latest() // Les plus récents en premier
            ->paginate(10); // Affiche 10 documents par page

        // 3. Retourner la vue et lui passer les données
        return view('sgac.dashboard', [
            'stats' => $stats,
            'documents' => $pendingDocuments,
        ]);
    }
}