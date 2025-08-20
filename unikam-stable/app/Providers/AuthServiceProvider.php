<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        /**
         * Porte pour les actions réservées aux administrateurs.
         */
        Gate::define('is-admin', function (User $user) {
            return $user->role === 'admin';
        });

        /**
         * Porte pour les actions réservées aux enseignants.
         */
        Gate::define('is-enseignant', function (User $user) {
            return $user->role === 'enseignant';
        });

        /**
         * Porte pour les actions réservées aux Secrétaires Généraux Académiques (SGAC).
         */
        Gate::define('is-sgac', function (User $user) {
            return $user->role === 'sgac';
        });

        /**
         * Porte pour les actions autorisées pour les Admins OU les Enseignants.
         */
        Gate::define('is-admin-or-enseignant', function (User $user) {
            return in_array($user->role, ['admin', 'enseignant']);
        });
        
        /**
         * NOUVEAU : Porte pour les actions de gestion de documents.
         * Réservée aux Admins ET aux SGAC.
         */
        Gate::define('manage-documents', function (User $user) {
            return in_array($user->role, ['admin', 'sgac']);
        });
    }
}