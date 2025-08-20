<div class="flex min-h-screen bg-gray-900 text-white">
    <!-- Partie gauche : visuel / branding -->
    <div class="hidden w-1/2 lg:flex flex-col items-center justify-center relative bg-gradient-to-br from-blue-700 to-blue-900 p-10">
        <!-- Logo de l'Université -->
        <div class="absolute top-8 left-8 flex items-center space-x-3">
            <img src="/images/logo-unikam.png" alt="UNIKAM" class="h-12 w-12 object-contain">
            <span class="text-2xl font-bold tracking-wider text-white">Université de Kamina</span>
        </div>

        <!-- Contenu visuel -->
        <div class="max-w-md text-center">
            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" 
                 alt="Étudiants sur le campus" 
                 class="rounded-2xl shadow-2xl mb-8" />
            <h2 class="text-3xl font-bold text-yellow-400">Heureux de vous revoir !</h2>
            <p class="mt-2 text-gray-200 leading-relaxed">Connectez-vous pour accéder à votre espace académique centralisé. 🎓</p>
        </div>
    </div>

    <!-- Partie droite : formulaire -->
    <div class="relative flex w-full lg:w-1/2 items-center justify-center px-6 py-12 bg-gray-800">
        {{-- On ajoute un conteneur pour positionner la mention de conception --}}
        <div class="relative w-full max-w-lg">
            <div class="space-y-10">
                <!-- Logo et Titre -->
                <div class="text-center">
                    {{-- On ajoute le logo ici pour le branding --}}
                    <img src="/images/logo-unikam.png" alt="UNIKAM" class="mx-auto h-16 w-16 object-contain mb-4">
                    <h2 class="text-3xl font-extrabold text-blue-400">Connexion à votre espace</h2>
                    <p class="mt-2 text-sm text-gray-400">
                        Pas encore de compte ? 
                        <a href="{{ route('register') }}" wire:navigate 
                           class="font-medium text-yellow-400 hover:text-yellow-300 underline">
                            S'inscrire
                        </a>
                    </p>
                </div>

                <!-- Formulaire de Connexion Livewire -->
                <form wire:submit="login" class="space-y-6">
                    <!-- Email -->
                    <div>
                        <label for="email" class="sr-only">Adresse e-mail</label>
                        <input wire:model="email" id="email" type="email" autocomplete="email" required
                               placeholder="Adresse e-mail institutionnelle"
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-400 border @error('email') border-red-500 @else border-gray-600 @enderror" />
                        @error('email') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input wire:model="password" id="password" type="password" autocomplete="current-password" required
                               placeholder="Mot de passe"
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-400 border @error('password') border-red-500 @else border-gray-600 @enderror" />
                        @error('password') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input wire:model="remember" id="remember" type="checkbox"
                                   class="w-4 h-4 text-blue-500 border-gray-600 rounded bg-gray-700 focus:ring-blue-500">
                            <label for="remember" class="ml-2 block text-sm text-gray-300">Se souvenir de moi</label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-yellow-400 hover:text-yellow-300 underline">Mot de passe oublié ?</a>
                        </div>
                    </div>

                    <!-- Bouton de Connexion -->
                    <button type="submit" 
                            class="w-full flex justify-center px-6 py-4 bg-blue-600 hover:bg-blue-500 rounded-lg text-lg font-semibold text-white transition-colors disabled:opacity-50"
                            wire:loading.attr="disabled">
                        <span wire:loading.remove>Se connecter</span>
                        <div wire:loading>
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        </div>
                    </button>
                </form>
            </div>
            
            <!-- Mention de Conception -->
            <footer class="absolute bottom-6 w-full text-center text-xs text-gray-500">
                Design & Développement par <span class="font-semibold text-blue-400">ir KASMUHE</span> &copy; {{ date('Y') }}
            </footer>
        </div>
    </div>
</div>