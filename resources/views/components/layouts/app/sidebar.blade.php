<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    {{-- La balise @include('partials.head') est conservée --}}
    @include('partials.head')
</head>
<body class="min-h-screen bg-zinc-50 dark:bg-zinc-950 antialiased font-sans">
    
    {{-- La sidebar reste inchangée --}}
    <aside class="fixed top-0 left-0 h-full w-72 border-e border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 z-30 hidden lg:flex flex-col p-4 transition-transform duration-300">
        <!-- ... tout le contenu de votre sidebar reste identique ... -->
        <!-- ==================== LOGO & APP NAME ==================== -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition"
           wire:navigate>
            <svg class="w-10 h-10 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v1.425A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <span class="text-xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">
                UNIKAM Share
            </span>
        </a>
        <!-- ==================== NAVIGATION ==================== -->
        <nav class="mt-8 flex flex-col gap-1">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 px-3 py-2 rounded-md font-medium transition-colors
                      {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-sm' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 hover:text-zinc-900 dark:hover:bg-zinc-800 dark:hover:text-zinc-50' }}"
               wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" /></svg>
                Tableau de bord
            </a>
            <a href="{{ route('documents.index') }}" 
               class="flex items-center gap-3 px-3 py-2 rounded-md font-medium transition-colors
                      {{ request()->routeIs('documents.index*') ? 'bg-blue-600 text-white shadow-sm' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 hover:text-zinc-900 dark:hover:bg-zinc-800 dark:hover:text-zinc-50' }}"
               wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" /></svg>
                Documents
            </a>
            @can('is-admin-or-enseignant')
                <a href="{{ route('documents.upload') }}" 
                   class="flex items-center gap-3 px-3 py-2 rounded-md font-medium transition-colors
                          {{ request()->routeIs('documents.upload') ? 'bg-blue-600 text-white shadow-sm' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 hover:text-zinc-900 dark:hover:bg-zinc-800 dark:hover:text-zinc-50' }}"
                   wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" /></svg>
                    Téléverser
                </a>
            @endcan
        </nav>
        <!-- ==================== ADMIN PANEL LINK ==================== -->
        @can('is-admin')
            <div class="mt-auto pt-8">
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center gap-3 px-3 py-2 rounded-md font-medium transition-colors
                          {{ request()->routeIs('admin.*') ? 'bg-zinc-700 text-white' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 hover:text-zinc-900 dark:hover:bg-zinc-800 dark:hover:text-zinc-50' }}"
                   wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.286zm0 13.036h.008v.008h-.008v-.008z" /></svg>
                    Administration
                </a>
            </div>
        @endcan
    </aside>

    <!-- ==================== MAIN CONTENT AREA ==================== -->
    <div class="lg:pl-72 transition-all duration-300">
        
        <!-- Header (Mobile & Desktop) -->
        <header class="sticky top-0 z-20 flex items-center justify-between lg:justify-end px-4 h-16 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-sm border-b border-zinc-200 dark:border-zinc-800">
            <!-- Mobile Sidebar Toggle -->
            <button type="button" class="lg:hidden text-zinc-600 dark:text-zinc-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
            
            <!-- ================================================================= -->
            <!--   MISE À JOUR : MENU UTILISATEUR AVEC DÉCONNEXION                 -->
            <!-- ================================================================= -->
             @auth
                {{-- On utilise Alpine.js (déjà inclus dans votre projet) pour gérer le dropdown --}}
                <div x-data="{ open: false }" class="relative">
                    {{-- Le bouton qui ouvre/ferme le menu --}}
                    <button @click="open = !open" type="button" class="flex items-center gap-3 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-blue-500 rounded-full transition">
                        <span class="text-sm font-medium text-zinc-200 hidden sm:inline">{{ auth()->user()->name }}</span>
                        <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold ring-2 ring-white/20">
                            {{-- Affiche les initiales de l'utilisateur --}}
                            {{ Str::upper(Str::substr(auth()->user()->name, 0, 2)) }}
                        </div>
                    </button>

                    {{-- Le contenu du menu déroulant --}}
                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-zinc-800 shadow-lg ring-1 ring-white/10 focus:outline-none"
                         style="display: none;">
                        <div class="py-1">
                            <div class="px-4 py-3">
                                <p class="text-sm text-white">Connecté en tant que</p>
                                <p class="truncate text-sm font-medium text-zinc-300">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="border-t border-zinc-700"></div>
                            <a href="{{ route('settings.profile') }}" class="block px-4 py-2 text-sm text-zinc-300 hover:bg-zinc-700/80" wire:navigate>Mon Profil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-zinc-300 hover:bg-zinc-700/80">Aide & Support</a>
                            <div class="border-t border-zinc-700"></div>
                            
                            <!-- Formulaire de Déconnexion Sécurisé -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="block w-full text-left px-4 py-2 text-sm text-rose-400 hover:bg-zinc-700/80">
                                    Se déconnecter
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-zinc-300 hover:text-white transition">Se connecter</a>
                    <a href="{{ route('register') }}" class="text-sm font-medium text-white bg-blue-600 px-3 py-1.5 rounded-md shadow hover:bg-blue-700 transition">S'inscrire</a>
                </div>
            @endauth
        </header>

        <!-- Page Content -->
        <main class="p-4 sm:p-6 lg:p-8">
            {{-- Le slot est maintenant prêt à recevoir les en-têtes de page --}}
            @isset($header)
                <div class="mb-8">
                    {{ $header }}
                </div>
            @endisset
            {{ $slot }}
        </main>
    </div>

    @fluxScripts
</body>
</html>