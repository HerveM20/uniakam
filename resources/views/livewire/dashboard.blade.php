<div>
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-2xl mx-auto">

            <!-- Titre de la page -->
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Téléverser un nouveau document</h2>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Remplissez les informations ci-dessous pour partager un document.</p>

            <!-- Message de succès -->
            @if (session()->has('success'))
                <div class="mt-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Formulaire -->
            <form wire:submit.prevent="save" class="mt-6 space-y-6">

                <!-- Titre -->
                <div>
                    <label for="titre" class="block text-sm font-medium">Titre du document</label>
                    <input type="text" wire:model="titre" id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm ...">
                    @error('titre') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Type de document -->
                <div>
                    <label for="type" class="block text-sm font-medium">Type</label>
                    <select wire:model="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm ...">
                        <option value="cours">Cours</option>
                        <option value="syllabus">Syllabus</option>
                        <option value="exercice">Exercice</option>
                        <option value="rapport">Rapport</option>
                        <option value="memoire">Mémoire</option>
                    </select>
                    @error('type') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                
                <!-- Fichier -->
                <div>
                    <label for="fichier" class="block text-sm font-medium">Fichier (PDF, Word, PowerPoint - 10Mo max)</label>
                    <input type="file" wire:model="fichier" id="fichier" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                     <!-- Indicateur de chargement -->
                    <div wire:loading wire:target="fichier" class="text-sm text-gray-500 mt-1">Chargement...</div>
                    @error('fichier') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Bouton de soumission -->
                <div class="pt-2">
                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 ...">
                        <span wire:loading.remove wire:target="save">Téléverser le document</span>
                        <span wire:loading wire:target="save">Téléversement...</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>