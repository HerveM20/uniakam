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
    Schema::table('users', function (Blueprint $table) {
        // On ajoute la colonne 'role' après la colonne 'filiere'
        // La valeur par défaut 'etudiant' est cruciale.
        $table->string('role')->after('filiere')->default('etudiant');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');
    });
    }
    };