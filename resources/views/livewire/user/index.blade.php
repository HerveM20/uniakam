<div class="p-4 sm:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto">

        <!-- En-tête et barre de recherche -->
        <div class="md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                    Gestion des Utilisateurs
                </h2>
            </div>
            <div class="mt-4 flex md:ml-4 md:mt-0">
                <input wire:model.live="search" type="search" placeholder="Rechercher un utilisateur..." class="w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <!-- Messages de feedback -->
        @if (session()->has('success'))
            <div class="mt-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
             <div class="mt-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tableau des utilisateurs -->
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 dark:ring-white/10 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-6">Nom</th>
                                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Email</th>
                                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Rôle Actuel</th>
                                    <th class="relative py-3.5 pl-3 pr-4 sm:pr-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700/50 bg-white dark:bg-gray-900/50">
                                @forelse ($users as $user)
                                    <tr wire:key="{{ $user->id }}">
                                        <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-6">{{ $user->name }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $user->email }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                                            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $user->role }}</span>
                                        </td>
                                        <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-2">
                                            <!-- Changer le rôle -->
                                            <select wire:change="changeRole({{ $user->id }}, $event.target.value)" class="rounded-md border-gray-300 shadow-sm text-sm dark:bg-gray-700 dark:border-gray-600">
                                                <option value="" disabled>Changer le rôle</option>
                                                <option value="etudiant" @if($user->role == 'etudiant') selected @endif>Étudiant</option>
                                                <option value="enseignant" @if($user->role == 'enseignant') selected @endif>Enseignant</option>
                                                <option value="sgac" @if($user->role == 'sgac') selected @endif>Agent Académique</option>
                                                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                            </select>
                                            
                                            <!-- Supprimer -->
                                            <button wire:click="deleteUser({{ $user->id }})" wire:confirm="Êtes-vous sûr de vouloir supprimer {{ $user->name }} ?" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center py-4">Aucun utilisateur trouvé.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">{{ $users->links() }}</div>
                </div>
            </div>
        </div>

    </div>
</div>```

### Étape 5 : Mettre à jour le Lien "Panel Admin"

Enfin, mettons à jour notre lien dans la sidebar pour qu'il pointe vers la nouvelle page.

1.  Ouvrez `resources/views/components/layouts/app/sidebar.blade.php`.
2.  Modifiez le lien du Panel Admin :

    ```html
    @can('is-admin')
        <flux:navlist.item icon="shield-check" :href="route('admin.users.index')" :current="request()->routeIs('admin.users.index')" wire:navigate>
            Panel Admin
        </flux:navlist.item>
    @endcan
    ```

C'est terminé ! Vous avez maintenant une interface d'administration complète et fonctionnelle.

**Pour tester :**
1.  Connectez-vous avec votre utilisateur **admin**.
2.  Cliquez sur le lien "Panel Admin".
3.  Vous devriez voir la liste de tous les utilisateurs.
4.  Essayez de changer le rôle d'un utilisateur ou d'en supprimer un.