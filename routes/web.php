<?php

// Importation des Contrôleurs
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SgacController; // <-- AJOUT : On importe le nouveau contrôleur

// Importation des composants Livewire
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {

    // --- Route pour le Dashboard Général ---
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    // --- Routes pour les Documents ---
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/upload', [DocumentController::class, 'upload'])
        ->name('documents.upload')
        ->middleware('can:is-admin-or-enseignant');

    // --- Routes pour les Paramètres ---
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // ===================================================================
    //  NOUVEAU : GROUPE DE ROUTES POUR L'ESPACE SGAC
    // ===================================================================
    Route::prefix('sgac')->middleware('can:is-sgac')->name('sgac.')->group(function () {
    
        // La page principale de l'espace de modération
        Route::get('/dashboard', [SgacController::class, 'dashboard'])->name('dashboard');

        // Nous ajouterons d'autres routes ici plus tard (ex: pour voir un document spécifique)
    
    });

    // --- Groupe de routes pour l'Administration ---
    Route::prefix('admin')->middleware('can:is-admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });

});

require __DIR__.'/auth.php';