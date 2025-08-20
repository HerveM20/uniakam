<div class="min-h-screen flex items-center justify-center p-4 font-sans bg-gradient-to-br from-gray-900 via-[#101F3C] to-gray-900">

    <div class="w-full max-w-sm">
        
        <!-- ======================================================== -->
        <!-- LOGO (LA CORRECTION EST ICI)                             -->
        <!-- ======================================================== -->
        <div class="flex justify-center mb-8">
            {{-- On remplace le cercle avec l'icône SVG par une balise <img> qui affiche votre logo --}}
            {{-- Assurez-vous que le fichier se trouve bien dans public/images/logo-unikam.png --}}
            <img src="{{ asset('images/logo-unikam.png') }}" alt="Logo UNIKAM" class="w-24 h-24 object-contain">
        </div>

        {{-- La Carte Principale --}}
        <div class="p-8 bg-[#1A2C4A]/70 backdrop-blur-xl rounded-2xl shadow-2xl border border-blue-800/30">
            
            <!-- Titre -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white">Connexion</h1>
                <p class="mt-2 text-sm text-gray-400">Accédez à votre espace UNIKAM.</p>
            </div>

            <!-- Formulaire -->
            <form wire:submit="login" class="space-y-6">

                <!-- Email -->
                <div>
                    <label for="email" class="text-sm font-medium text-gray-300 mb-2 block">Adresse e-mail</label>
                    <input wire:model="email" id="email" type="email" autocomplete="email" required
                           class="w-full px-4 py-3 rounded-lg bg-gray-800/60 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-gray-800 border border-gray-700 transition" />
                    @error('email') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Mot de passe -->
                <div>
                    <label for="password" class="text-sm font-medium text-gray-300 mb-2 block">Mot de passe</label>
                    <input wire:model="password" id="password" type="password" autocomplete="current-password" required
                           class="w-full px-4 py-3 rounded-lg bg-gray-800/60 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-gray-800 border border-gray-700 transition" />
                </div>

                <!-- Options -->
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center">
                        <input wire:model="remember" id="remember" type="checkbox"
                               class="w-4 h-4 text-blue-500 border-gray-600 rounded bg-gray-700 focus:ring-blue-500 focus:ring-offset-gray-900">
                        <label for="remember" class="ml-2 block text-gray-300">Se souvenir de moi</label>
                    </div>
                    <div>
                        <a href="#" class="font-medium text-blue-400 hover:text-blue-300">Mot de passe oublié ?</a>
                    </div>
                </div>

                <!-- Bouton de Connexion -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-blue-500 disabled:opacity-60 transition"
                            wire:loading.attr="disabled">
                        <span wire:loading.remove>Se connecter</span>
                        <span wire:loading>Connexion...</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Liens secondaires -->
        <div class="mt-8 text-center text-sm text-gray-400 space-y-2">
            <p>
                Pas encore de compte ? 
                <a href="{{ route('register') }}" wire:navigate class="font-medium text-blue-400 hover:underline">
                    Créer un compte
                </a>
            </p>
            <p class="text-xs text-gray-500">
                Design par <span class="font-semibold">ir KASMUHE</span> &copy; {{ date('Y') }}
            </p>
        </div>
    </div>
</div>