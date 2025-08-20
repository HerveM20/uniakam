{{-- Fichier : resources/views/partials/admin-stats.blade.php --}}

{{--
    Ce "partial" contient UNIQUEMENT la section des statistiques.
    Il est appelé depuis la vue principale du dashboard.
--}}
<div x-data>
    <h3 class="text-xl font-semibold text-white">
        Aperçu de la Plateforme
    </h3>

    <dl class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

        <!-- Carte : Utilisateurs -->
        <div class="flex flex-col overflow-hidden rounded-lg bg-gray-800 shadow ring-1 ring-white/10">
            <div class="flex-grow p-5">
                <div class="flex items-center gap-x-4">
                    <div class="flex-shrink-0 rounded-md bg-blue-900/80 p-3">
                        <svg class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.962a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5zM3.75 18.75a3 3 0 003.75 2.25A3 3 0 0011.25 18.75v-1.5c0-1.026.923-1.875 2.063-1.875h1.5c1.14 0 2.063.849 2.063 1.875v1.5z" /></svg>
                    </div>
                    <div class="flex-1">
                        <p class="truncate text-sm font-medium text-gray-400">Utilisateurs</p>
                        <p class="text-2xl font-semibold text-white">{{ $stats['totalUsers'] }}</p>
                    </div>
                </div>
            </div>
            <div class="h-[60px] w-full"><div id="chart-users"></div></div>
        </div>

        <!-- Carte : Étudiants -->
        <div class="flex flex-col overflow-hidden rounded-lg bg-gray-800 shadow ring-1 ring-white/10">
            <div class="flex-grow p-5">
                <div class="flex items-center gap-x-4">
                    <div class="flex-shrink-0 rounded-md bg-yellow-900/80 p-3">
                        <svg class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0l-3.976 5.197m0 0a59.927 59.927 0 01-2.182.84A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41m-18.118-5.197a50.697 50.697 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m0 0l-3.976-5.197m-6.423 7.303a3.75 3.75 0 01-4.242-4.242 3.75 3.75 0 014.242 4.242z" /></svg>
                    </div>
                    <div class="flex-1">
                        <p class="truncate text-sm font-medium text-gray-400">Étudiants</p>
                        <p class="text-2xl font-semibold text-white">{{ $stats['totalStudents'] }}</p>
                    </div>
                </div>
            </div>
            <div class="h-[60px] w-full"><div id="chart-students"></div></div>
        </div>
        
        <!-- Carte : Enseignants -->
        <div class="flex flex-col overflow-hidden rounded-lg bg-gray-800 shadow ring-1 ring-white/10">
            <div class="flex-grow p-5"><div class="flex items-center gap-x-4"><div class="flex-shrink-0 rounded-md bg-rose-900/80 p-3"><svg class="h-6 w-6 text-rose-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.07a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.58a2.25 2.25 0 012.25-2.25h15A2.25 2.25 0 0122.5 8.58v4.07a2.25 2.25 0 01-2.25 2.25z" /><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 6.75v1.5a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75v-1.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75z" /></svg></div><div class="flex-1"><p class="truncate text-sm font-medium text-gray-400">Enseignants</p><p class="text-2xl font-semibold text-white">{{ $stats['totalTeachers'] }}</p></div></div></div>
            <div class="h-[60px] w-full"><div id="chart-teachers"></div></div>
        </div>

        <!-- Carte : Documents -->
        <div class="flex flex-col overflow-hidden rounded-lg bg-gray-800 shadow ring-1 ring-white/10">
            <div class="flex-grow p-5"><div class="flex items-center gap-x-4"><div class="flex-shrink-0 rounded-md bg-emerald-900/80 p-3"><svg class="h-6 w-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5 .124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m9.375 2.25c.621 0 1.125.504 1.125 1.125v3.375c0 .621-.504 1.125-1.125 1.125h-1.5a1.125 1.125 0 01-1.125-1.125v-3.375c0-.621.504-1.125 1.125-1.125h1.5z" /></svg></div><div class="flex-1"><p class="truncate text-sm font-medium text-gray-400">Documents</p><p class="text-2xl font-semibold text-white">{{ $stats['totalDocuments'] }}</p></div></div></div>
            <div class="h-[60px] w-full"><div id="chart-documents"></div></div>
        </div>
        
    </dl>
</div>