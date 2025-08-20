<div class="p-4 sm:p-6 lg:p-8">
    <div class="max-w-2xl mx-auto">

        <!-- Carte principale -->
        <div class="bg-white dark:bg-zinc-900/90 backdrop-blur-xl shadow-2xl rounded-2xl p-8 border border-gray-100 dark:border-zinc-700 transition duration-300 hover:shadow-blue-200 dark:hover:shadow-blue-800/30">

            <!-- En-tête -->
            <div class="text-center">
                <div class="inline-flex items-center justify-center p-4 bg-gradient-to-tr from-blue-100 to-blue-200 rounded-full dark:from-blue-800/60 dark:to-blue-900/30 shadow-inner">
                    <svg class="w-12 h-12 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 16.5V9.75m0 0l-3 3m3-3l3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 
                              5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 
                              3.752 0 0118 19.5H6.75z" />
                    </svg>
                </div>
                <h2 class="mt-4 text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">
                    Téléverser un nouveau document
                </h2>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Remplissez les informations ci-dessous pour partager un document.
                </p>
            </div>

            <!-- Message succès -->
            @if (session()->has('success'))
                <div class="mt-6 flex items-center gap-2 p-4 text-sm text-green-700 bg-green-100 rounded-lg 
                            dark:bg-green-200 dark:text-green-800 animate-fade-in" role="alert">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <!-- Formulaire -->
            <form wire:submit="save" class="mt-8 space-y-6">

                <!-- Titre -->
                <div>
                    <label for="titre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Titre du document
                    </label>
                    <input type="text" wire:model="titre" id="titre"
                           placeholder="ex: Chapitre 1 : Introduction"
                           class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm 
                                  dark:bg-zinc-800 dark:border-zinc-600 dark:text-white
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    @error('titre')
                        <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Grille Type / Matière -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Type -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                        <select wire:model="type" id="type"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm 
                                       dark:bg-zinc-800 dark:border-zinc-600 dark:text-white
                                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="cours">Cours</option>
                            <option value="syllabus">Syllabus</option>
                            <option value="exercice">Exercice</option>
                            <option value="rapport">Rapport</option>
                            <option value="memoire">Mémoire</option>
                        </select>
                        @error('type')
                            <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Matière -->
                    <div>
                        <label for="matiere" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Matière (Optionnel)
                        </label>
                        <input type="text" wire:model="matiere" id="matiere"
                               placeholder="ex: Développement Web"
                               class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm 
                                      dark:bg-zinc-800 dark:border-zinc-600 dark:text-white
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        @error('matiere')
                            <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Fichier -->
                <div>
                    <label for="fichier" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Fichier (PDF, Word, PPT - 10Mo max)
                    </label>
                    <input type="file" wire:model="fichier" id="fichier"
                           class="mt-2 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0 file:font-semibold
                                  file:bg-gradient-to-r file:from-blue-100 file:to-blue-200 file:text-blue-700
                                  hover:file:from-blue-200 hover:file:to-blue-300
                                  dark:file:from-blue-900/40 dark:file:to-blue-800/30 
                                  dark:file:text-blue-300 dark:hover:file:from-blue-900 dark:hover:file:to-blue-700 transition">
                    <div wire:loading wire:target="fichier" class="text-sm text-gray-500 mt-2 animate-pulse">
                        ⏳ Chargement du fichier...
                    </div>
                    @error('fichier')
                        <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Bouton -->
                <div class="pt-4 text-right">
                    <button type="submit" wire:loading.attr="disabled"
                            class="inline-flex items-center justify-center gap-2 px-6 py-3
                                   bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800
                                   border border-transparent rounded-xl font-semibold text-white shadow-lg
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 
                                   disabled:opacity-50 transition duration-200">
                        <svg wire:loading wire:target="save" class="animate-spin h-5 w-5 text-white"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.37 0 0 5.37 
                                     0 12h4zm2 5.29A7.96 7.96 0 014 12H0c0 
                                     3.04 1.13 5.82 3 7.94l3-2.65z"></path>
                        </svg>
                        <span wire:loading.remove wire:target="save">📤 Téléverser</span>
                        <span wire:loading wire:target="save">En cours...</span>
                    </button>
                </div>
            </form>

            <!-- Signature -->
            <div class="mt-6 text-xs text-gray-400 dark:text-gray-500 text-center italic">
                Design by <span class="font-semibold text-blue-600 dark:text-blue-400">ir KASMUHE 2025</span>
            </div>
        </div>
    </div>
</div>
