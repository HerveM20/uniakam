<?php

namespace App\Livewire;

use App\Models\Document;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // Récupérer les statistiques UNIQUEMENT si l'utilisateur est un admin
        $stats = [];
        if (auth()->user() && auth()->user()->role === 'admin') {
            $stats = [
                'totalUsers' => User::count(),
                'totalStudents' => User::where('role', 'etudiant')->count(),
                'totalTeachers' => User::where('role', 'enseignant')->count(),
                'totalDocuments' => Document::count(),
            ];
        }

        return view('livewire.dashboard', [
            'stats' => $stats, // On envoie les stats à la vue
        ])
        ->layout('components.layouts.app.sidebar'); // <-- CETTE LIGNE EST LA PLUS IMPORTANTE
    }
}