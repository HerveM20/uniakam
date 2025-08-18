<div class="flex min-h-screen bg-gray-900 text-white">
    <!-- Partie gauche : visuel / branding -->
    <div class="hidden w-1/2 lg:flex flex-col items-center justify-center relative bg-gradient-to-br from-blue-700 to-blue-900 p-10">
        <!-- Logo -->
        <div class="absolute top-6 left-6 flex items-center space-x-2">
            <img src="/images/logo-unikam.png" alt="UNIKAM" class="h-12">
            <span class="text-2xl font-bold tracking-wider text-white">Université de Kamina</span>
        </div>

        <!-- Contenu visuel -->
        <div class="max-w-md text-center">
            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" 
                 alt="Campus" 
                 class="rounded-2xl shadow-2xl mb-6" />
            <h2 class="text-2xl font-bold text-yellow-400">Former l’excellence</h2>
            <p class="mt-2 text-gray-200">Rejoignez la communauté académique de l’UNIKAM 🎓</p>
        </div>
    </div>

    <!-- Partie droite : formulaire -->
    <div class="flex w-full lg:w-1/2 items-center justify-center px-6 py-12 bg-gray-800">
        <div class="w-full max-w-md space-y-8">
            
            <!-- Titre -->
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-blue-400">Créer un compte étudiant</h2>
                <p class="mt-2 text-sm text-gray-400">
                    Déjà inscrit ? 
                    <flux:link :href="route('login')" wire:navigate 
                               class="text-yellow-400 hover:text-yellow-300 underline">
                        Se connecter
                    </flux:link>
                </p>
            </div>

            <!-- Formulaire Livewire -->
            <form wire:submit.prevent="register" class="mt-8 space-y-5">

                <!-- Nom complet -->
                <div>
                    <flux:input wire:model.blur="name" id="name" type="text" required autofocus 
                                placeholder="Nom complet"
                                :input-class="'w-full px-4 py-3 rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-blue-400 border ' 
                                             . ($errors->has('name') ? 'border-red-500' : 'border-gray-600')" />
                    @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <flux:input wire:model.blur="email" id="email" type="email" required
                                placeholder="Adresse e-mail institutionnelle"
                                :input-class="'w-full px-4 py-3 rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-blue-400 border ' 
                                             . ($errors->has('email') ? 'border-red-500' : 'border-gray-600')" />
                    @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Matricule & Filière -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <flux:input wire:model.blur="matricule" id="matricule" type="text" required
                                    placeholder="Matricule (2025-ABCD)"
                                    :input-class="'w-full px-4 py-3 rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-blue-400 border ' 
                                                 . ($errors->has('matricule') ? 'border-red-500' : 'border-gray-600')" />
                        @error('matricule') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <flux:input wire:model.blur="filiere" id="filiere" type="text" required
                                    placeholder="Filière (ex: Génie Informatique)"
                                    :input-class="'w-full px-4 py-3 rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-blue-400 border ' 
                                                 . ($errors->has('filiere') ? 'border-red-500' : 'border-gray-600')" />
                        @error('filiere') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Mot de passe -->
                <div>
                    <flux:input wire:model.blur="password" id="password" type="password" required
                                placeholder="Mot de passe" viewable
                                :input-class="'w-full px-4 py-3 rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-blue-400 border ' 
                                             . ($errors->has('password') ? 'border-red-500' : 'border-gray-600')" />
                    @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Confirmation mot de passe -->
                <div>
                    <flux:input wire:model.blur="password_confirmation" id="password_confirmation" type="password" required
                                placeholder="Confirmer le mot de passe" viewable
                                :input-class="'w-full px-4 py-3 rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-blue-400 border ' 
                                             . ($errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-600')" />
                    @error('password_confirmation') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Conditions -->
                <div class="flex items-center">
                    <input id="terms" type="checkbox" wire:model="terms" 
                           class="w-4 h-4 text-blue-500 border-gray-600 rounded bg-gray-700 focus:ring-blue-500">
                    <label for="terms" class="ml-2 text-sm text-gray-300">
                        J’accepte les conditions d’utilisation
                    </label>
                </div>
                @error('terms') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror

                <!-- Bouton principal -->
                <flux:button type="submit" variant="primary" 
                             class="w-full px-6 py-3 bg-blue-600 hover:bg-blue-500 rounded-lg font-semibold transition-colors"
                             wire:loading.attr="disabled">
                    <span wire:loading.remove>Créer mon compte</span>
                    <span wire:loading>Création...</span>
                </flux:button>

                <!-- Autres options -->
                <div class="flex items-center justify-center gap-4 mt-6">
                    <button type="button" class="flex items-center gap-2 px-4 py-2 w-1/2 justify-center border border-gray-600 rounded-lg bg-gray-700 hover:bg-gray-600">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5" alt="Google"> Google
                    </button>
                    <button type="button" class="flex items-center gap-2 px-4 py-2 w-1/2 justify-center border border-gray-600 rounded-lg bg-gray-700 hover:bg-gray-600">
                        <img src="https://www.svgrepo.com/show/303128/apple-logo.svg" class="w-5 h-5" alt="Apple"> Apple
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
