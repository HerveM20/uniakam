<?php

// Importation des Contrôleurs
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;

// Importation des composants Livewire
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;

use Illuminate\Support\Facades\Route;

/* ... */

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {

    // --- Routes via Contrôleurs (Pas de problème ici) ---
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/upload', [DocumentController::class, 'upload'])
        ->name('documents.upload')
        ->middleware('can:is-admin-or-enseignant');

    // --- Routes des Paramètres (CE SONT CELLES-CI QUI POSENT PROBLÈME) ---
    // Nous les commentons temporairement
    // Route::redirect('settings', 'settings/profile');
    // Route::get('settings/profile', Profile::class)->name('settings.profile');
    // Route::get('settings/password', Password::class)->name('settings.password');
    // Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // --- Route Admin (Pas de problème ici) ---
    Route::prefix('admin')->middleware('can:is-admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });

});

// La route d'authentification est aussi un problème, nous la commentons aussi.
// require __DIR__.'/auth.php';