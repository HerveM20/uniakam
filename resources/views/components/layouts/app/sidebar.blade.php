<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    <flux:navlist.item icon="document-text" :href="route('documents.index')" :current="request()->routeIs('documents.index')" wire:navigate>
                        Documents
                    </flux:navlist.item>
                    @can('is-admin-or-enseignant')
                        <flux:navlist.item icon="cloud-arrow-up" :href="route('documents.upload')" :current="request()->routeIs('documents.upload')" wire:navigate>
                        Téléverser un document
                        </flux:navlist.item>
                    @endcan

                    <!-- ===================== LIEN MANQUANT AJOUTÉ ICI ===================== -->
                    @can('is-admin')
                        <flux:navlist.item icon="shield-check" :href="route('admin.users.index')" :current="request()->routeIs('admin.users.index')" wire:navigate>
                            Panel Admin
                        </flux:navlist.item>
                    @endcan
                    <!-- ==================================================================== -->
                    
                </flux:navlist.group>
            </flux:navlist>
            
            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            {{-- ... le reste du fichier est correct ... --}}
            
            @auth
                <!-- Desktop User Menu -->
                <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                    {{-- ... --}}
                </flux:dropdown>
            @else
                <!-- Liens pour les visiteurs sur Desktop -->
                <div class="hidden lg:flex items-center space-x-4 p-4">
                    {{-- ... --}}
                </div>
            @endauth
        </flux:sidebar>

        <flux:header class="lg:hidden">
            {{-- ... --}}
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>