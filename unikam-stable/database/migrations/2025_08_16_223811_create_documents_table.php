<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('documents', function (Blueprint $table) {
        $table->id(); // La clé primaire (ex: 1, 2, 3...)
        
        // Clé étrangère pour lier le document à l'utilisateur qui l'a posté.
        // C'est la colonne la plus importante.
        // constrained() lie à la table 'users' et onDelete('cascade') supprime
        // les documents si l'utilisateur est supprimé.
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->string('titre'); // Le titre du document, ex: "Chapitre 1 : Introduction à Laravel"
        $table->string('type');  // Le type, ex: "cours", "syllabus", "exercice"
        $table->string('matiere')->nullable(); // La matière, ex: "Développement Web"
        $table->string('promotion')->nullable(); // La promotion ciblée, ex: "L3 Génie Info"
        $table->string('fichier_path'); // Le chemin où le fichier est stocké sur le serveur
        $table->string('fichier_nom_original'); // Le nom original du fichier
        
        $table->timestamps(); // Ajoute les colonnes created_at et updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
