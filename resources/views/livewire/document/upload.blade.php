<div class="p-4 sm:p-6 lg:p-8">
    <div class="max-w-2xl mx-auto">

        <!-- La carte contenant le formulaire -->
        <div class="bg-white dark:bg-gray-800/90 backdrop-blur-sm shadow-lg rounded-xl p-8">
        
            <!-- En-tête -->
            <div class="text-center">
                <div class="inline-block p-3 bg-blue-100 rounded-full dark:bg-blue-900/50">
                     <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l-3 3m3-3l3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" /></svg>
                </div>
                <h2 class="mt-4 text-2xl font-bold text-gray-900 dark:text-white">Téléverser un nouveau document</h2>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Remplissez les informations ci-dessous pour partager un document.</p>
            </div>

            <!-- Message de succès -->
            @if (session()->has('success'))
                <div class="mt-6 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Formulaire -->
            <form wire:submit="save" class="mt-6 space-y-6">

                <!-- Titre -->
                <div>
                    <label for="titre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titre du document</label>
                    <input type="text" wire:model="titre" id="titre" placeholder="ex: Chapitre 1 : Introduction"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                    @error('titre') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Grille pour Type et Matière -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Type de document -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                        <select wire:model="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                            <option value="cours">Cours</option>
                            <option value="syllabus">Syllabus</option>
                            <option value="exercice">Exercice</option>
                            <option value="rapport">Rapport</option>
                            <option value="memoire">Mémoire</option>
                        </select>
                        @error('type') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>
                     <!-- Matière -->
                    <div>
                        <label for="matiere" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Matière (Optionnel)</label>
                        <input type="text" wire:model="matiere" id="matiere" placeholder="ex: Développement Web"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        @error('matiere') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Fichier -->
                <div>
                    <label for="fichier" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fichier (PDF, Word, PPT - 10Mo max)</label>
                    <div class="mt-1">
                        <input type="file" wire:model="fichier" id="fichier" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 dark:file:bg-blue-900/50 dark:file:text-blue-300 dark:hover:file:bg-blue-900">
                    </div>
                    <div wire:loading wire:target="fichier" class="text-sm text-gray-500 mt-2">Chargement du fichier...</div>
                    @error('fichier') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Bouton de soumission -->
                <div class="pt-2 text-right">
                    <button type="submit" wire:loading.attr="disabled"
                            class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 transition">
                        <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span wire:loading.remove wire:target="save">Téléverser</span>
                        <span wire:loading wire:target="save">En cours...</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>