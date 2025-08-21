<x-layouts.app>
    {{-- ======================================================= --}}
    {{--  En-tête de la page du SGAC                             --}}
    {{-- ======================================================= --}}
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-white">
                Espace de Modération SGAC
            </h2>
            <p class="mt-1 text-sm text-gray-400">
                Validez, classez et gérez les documents soumis sur la plateforme.
            </p>
        </div>
    </x-slot>

    {{-- ================================================== --}}
    {{--  Contenu principal                                  --}}
    {{-- ================================================== --}}
    <div class="space-y-10">
        
        <!-- Cartes de Statistiques -->
        <div>
            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                {{-- Carte : En attente --}}
                <div class="overflow-hidden rounded-lg bg-gray-800 px-4 py-5 shadow ring-1 ring-white/10 sm:p-6">
                    <dt class="truncate text-sm font-medium text-yellow-400">Documents en attente</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-white">{{ $stats['pending'] }}</dd>
                </div>
                {{-- Carte : Approuvés --}}
                <div class="overflow-hidden rounded-lg bg-gray-800 px-4 py-5 shadow ring-1 ring-white/10 sm:p-6">
                    <dt class="truncate text-sm font-medium text-green-400">Approuvés (7j)</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-white">{{ $stats['approved_weekly'] }}</dd>
                </div>
                {{-- Carte : Rejetés --}}
                <div class="overflow-hidden rounded-lg bg-gray-800 px-4 py-5 shadow ring-1 ring-white/10 sm:p-6">
                    <dt class="truncate text-sm font-medium text-rose-400">Rejetés (7j)</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-white">{{ $stats['rejected_weekly'] }}</dd>
                </div>
            </dl>
        </div>

        <!-- Table de Modération : Documents en attente -->
        <div>
            <h3 class="text-xl font-semibold text-white">File d'attente de modération</h3>
            <div class="mt-4 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-white/10 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead class="bg-gray-800/60">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Document</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Soumis par</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Date de soumission</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-800 bg-gray-900">
                                    @forelse ($documents as $document)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                <div class="font-medium text-white">{{ $document->title }}</div>
                                                {{-- Vous pouvez ajouter d'autres infos ici, comme la filière si elle existe sur le modèle Document --}}
                                                <div class="text-gray-400">{{ $document->filiere ?? 'Filière non spécifiée' }}</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $document->user->name }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $document->created_at->format('d/m/Y à H:i') }}</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                {{-- Ce lien mènera à l'interface de révision détaillée que nous créerons ensuite --}}
                                                <a href="#" class="text-blue-400 hover:text-blue-300">
                                                    Réviser<span class="sr-only">, {{ $document->title }}</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="whitespace-nowrap px-3 py-12 text-center text-sm text-gray-400">
                                                <div class="flex items-center justify-center gap-2">
                                                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                                                    <span>La file d'attente est vide. Excellent travail !</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Affichage des liens de pagination --}}
                        <div class="mt-4">
                            {{ $documents->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>