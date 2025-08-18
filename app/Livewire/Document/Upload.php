<?php

namespace App\Livewire\Document;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithFileUploads; // Trait essentiel pour gérer les téléversements

class Upload extends Component
{
    use WithFileUploads; // Active la gestion de fichiers

    // Propriétés liées aux champs du formulaire
    public $titre;
    public $type = 'cours'; // Valeur par défaut pour le select
    public $matiere;
    public $promotion;
    public $fichier; // Propriété pour le fichier téléversé

    // Règles de validation
    protected $rules = [
        'titre' => 'required|string|max:255',
        'type' => 'required|string|in:cours,syllabus,exercice,rapport,memoire',
        'matiere' => 'nullable|string|max:255',
        'promotion' => 'nullable|string|max:255',
        'fichier' => 'required|file|mimes:pdf,docx,pptx|max:10240', // Fichier requis, pdf/docx/pptx, max 10Mo
    ];

    public function save()
    {
        // 1. Valider les données
        $validatedData = $this->validate();

        // 2. Stocker le fichier
        // 'documents' est le dossier dans 'storage/app/public'
        // 'public' est le "disque" de stockage
        $path = $this->fichier->store('documents', 'public');

        // 3. Créer l'entrée dans la base de données
        Document::create([
            'user_id' => auth()->id(), // ID de l'utilisateur connecté
            'titre' => $validatedData['titre'],
            'type' => $validatedData['type'],
            'matiere' => $validatedData['matiere'],
            'promotion' => $validatedData['promotion'],
            'fichier_path' => $path,
            'fichier_nom_original' => $this->fichier->getClientOriginalName(),
        ]);

        // 4. Donner un feedback à l'utilisateur et réinitialiser le formulaire
        session()->flash('success', 'Document téléversé avec succès !');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.document.upload');
    }
}