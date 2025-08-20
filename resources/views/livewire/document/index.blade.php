<div class="p-4 sm-p-6 lg-p-8">
    <div class="max-w-7xl mx-auto">

        <!-- En-tête de la page -->
        <div class="md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                    Bibliothèque de documents
                </h2>
            </div>
        </div>

        <!-- Message de succès pour la suppression -->
        @if (session()->has('success'))
            <div class="mt-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tableau des documents -->
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 dark:ring-white/10 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-zinc-800">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-6">Titre</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Auteur</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Date</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700/50 bg-white dark:bg-zinc-900/50">
                                @forelse ($documents as $document)
                                    <tr wire:key="{{ $document->id }}">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-6">{{ $document->titre }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $document->user->name }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $document->created_at->format('d/m/Y') }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-4">
                                            <a href="#" wire:click.prevent="download({{ $document->id }})" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                Télécharger
                                            </a>
                                            @can('manage-documents')
                                                <button 
                                                    wire:click="deleteDocument({{ $document->id }})" 
                                                    wire:confirm="Êtes-vous sûr de vouloir supprimer '{{ $document->titre }}' ?"
                                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                                >
                                                    Supprimer
                                                </button>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center py-4">Aucun document n'a été publié.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">{{ $documents->links() }}</div>
                </div>
            </div>
        </div>

    </div>
</div>