<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-unikam-gray-light dark:bg-black antialiased font-sans">
    
    {{-- La sidebar utilise maintenant les couleurs de l'UNIKAM --}}
    <aside class="fixed top-0 left-0 h-full w-72 border-e border-gray-200 dark:border-unikam-gray-dark bg-white dark:bg-unikam-gray z-30 hidden lg:flex flex-col p-4">

        <!-- ==================== LOGO & APP NAME ==================== -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition"
           wire:navigate>
            {{-- On remplace le SVG par votre logo officiel --}}
            <img src="{{ asset('images/logo-unikam.png') }}" alt="Logo UNIKAM" class="h-14 w-14 object-contain">
            <span class="text-xl font-bold text-gray-800 dark:text-white tracking-tight">
                UNIKAM Share
            </span>
        </a>
        
        <!-- ==================== NAVIGATION PRINCIPALE ==================== -->
        <nav class="mt-8 flex flex-col gap-1">
            {{-- Les liens utilisent maintenant la couleur verte de l'UNIKAM pour l'état actif --}}
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 px-3 py-2 rounded-md font-medium transition-colors
                      {{ request()->routeIs('dashboard') ? 'bg-unikam-green text-white shadow-sm' : 'text-gray-300 hover:bg-unikam-gray-dark hover:text-white' }}"
               wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" /></svg>
                Tableau de bord
            </a>
            <a href="{{ route('documents.index') }}" 
               class="flex items-center gap-3 px-3 py-2 rounded-md font-medium transition-colors
                      {{ request()->routeIs('documents.index*') ? 'bg-unikam-green text-white shadow-sm' : 'text-gray-300 hover:bg-unikam-gray-dark hover:text-white' }}"
               wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" /></svg>
                Documents
            </a>
            @can('is-admin-or-enseignant')
                <a href="{{ route('documents.upload') }}" 
                   class="flex items-center gap-3 px-3 py-2 rounded-md font-medium transition-colors
                          {{ request()->routeIs('documents.upload') ? 'bg-unikam-green text-white shadow-sm' : 'text-gray-300 hover:bg-unikam-gray-dark hover:text-white' }}"
                   wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" /></svg>
                    Téléverser
                </a>
            @endcan
        </nav>

        <div class="mt-auto pt-8 flex flex-col gap-1">
            @can('is-sgac')
                <a href="{{ route('sgac.dashboard') }}" 
                   class="flex items-center gap-3 px-3 py-2 rounded-md font-medium transition-colors
                          {{ request()->routeIs('sgac.*') ? 'bg-unikam-green text-white shadow-sm' : 'text-gray-300 hover:bg-unikam-gray-dark hover:text-white' }}"
                   wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Espace Modération
                </a>
            @endcan
            @can('is-admin')
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center gap-3 px-3 py-2 rounded-md font-medium transition-colors
                          {{ request()->routeIs('admin.*') ? 'bg-unikam-green text-white' : 'text-gray-300 hover:bg-unikam-gray-dark hover:text-white' }}"
                   wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.286zm0 13.036h.008v.008h-.008v-.008z" /></svg>
                    Administration
                </a>
            @endcan
        </div>
    </aside>

    <div class="lg:pl-72 transition-all duration-300">
        {{-- L'en-tête utilise maintenant le gris foncé de l'UNIKAM --}}
        <header class="sticky top-0 z-20 flex items-center justify-between lg:justify-end px-4 h-16 bg-white/80 dark:bg-unikam-gray/80 backdrop-blur-sm border-b border-gray-200 dark:border-unikam-gray-dark">
            <button type="button" class="lg:hidden text-zinc-600 dark:text-zinc-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" type="button" class="flex items-center gap-3 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-unikam-gray focus:ring-unikam-green-dark rounded-full transition">
                        <span class="text-sm font-medium text-gray-200 hidden sm:inline">{{ auth()->user()->name }}</span>
                        <div class="w-9 h-9 rounded-full bg-unikam-green flex items-center justify-center text-white font-bold ring-2 ring-white/20">
                            {{ Str::upper(Str::substr(auth()->user()->name, 0, 2)) }}
                        </div>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition ... class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-unikam-gray-dark shadow-lg ring-1 ring-black/20 focus:outline-none" style="display: none;">
                        <div class="py-1">
                            {{-- ... contenu du dropdown ... --}}
                        </div>
                    </div>
                </div>
            @else
                {{-- ... boutons login/register ... --}}
            @endauth
        </header>

        <main class="p-4 sm:p-6 lg:p-8">
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