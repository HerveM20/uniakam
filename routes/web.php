<?php

// Importation des Contrôleurs
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController; // Contrôleur pour le Dashboard
use App\Http\Controllers\DocumentController;

// Importation des composants Livewire du Starter Kit (ceux-ci fonctionnent)
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Version finale utilisant des contrôleurs pour contourner les conflits.
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {

    // --- Route pour le Dashboard (maintenant via DashboardController) ---
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    // --- Routes pour les Documents (via DocumentController) ---
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/upload', [DocumentController::class, 'upload'])
        ->name('documents.upload')
        ->middleware('can:is-admin-or-enseignant');

    // --- Routes pour les Paramètres (celles-ci fonctionnent, on n'y touche pas) ---
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // --- Groupe de routes pour l'Administration (via UserController) ---
    Route::prefix('admin')->middleware('can:is-admin')->name('admin.')->group(function () {
    
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    
    });

});

require __DIR__.'/auth.php';