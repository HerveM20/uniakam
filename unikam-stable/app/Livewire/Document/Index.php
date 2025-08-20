<?php

namespace App\Livewire\Document;

use App\Models\Document;
use Illuminate\Support\Facades\Gate;      // LIGNE AJOUTÉE
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function download(int $documentId)
    {
        $document = Document::findOrFail($documentId);

        if (!Storage::disk('public')->exists($document->fichier_path)) {
            abort(404, 'Fichier non trouvé.');
        }

        return Storage::disk('public')->download($document->fichier_path, $document->fichier_nom_original);
    }

    /**
     * NOUVEAU : Gère la suppression d'un document.
     */
    public function deleteDocument(Document $document)
    {
        // 1. Vérification de la permission en utilisant notre nouveau Gate.
        Gate::authorize('manage-documents');

        // 2. Supprimer le fichier physique du serveur.
        Storage::disk('public')->delete($document->fichier_path);

        // 3. Supprimer l'enregistrement de la base de données.
        $document->delete();

        // 4. Donner un feedback à l'utilisateur.
        session()->flash('success', 'Le document "' . $document->titre . '" a été supprimé avec succès.');
    }

    public function render()
    {
        $documents = Document::with('user')->latest()->paginate(10);

        return view('livewire.document.index', [
            'documents' => $documents,
        ])
        ->layout('components.layouts.app.sidebar'); // Assure que le layout est bien appelé
    }
}