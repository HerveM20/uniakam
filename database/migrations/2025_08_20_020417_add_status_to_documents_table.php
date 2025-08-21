<?php

use Illuminate\Database\Migrations\Migration; // CORRIGÉ
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;       // CORRIGÉ

return new class extends Migration
{
    /**
     * Exécute les migrations pour ajouter les colonnes de statut.
     */
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('status')->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Annule les migrations en supprimant les colonnes ajoutées.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            // S'assure que la table existe avant de tenter de supprimer la clé
            if (Schema::hasColumn('documents', 'reviewed_by')) {
                $table->dropForeign(['reviewed_by']);
            }
            $table->dropColumn(['reviewed_by', 'reviewed_at', 'rejection_reason', 'status']);
        });
    }
};