<!-- Section Statistiques Admin -->
@can('is-admin')
<div>
    <h3 class="text-lg font-medium leading-6 text-zinc-900 dark:text-zinc-100">
        Statistiques Générales
    </h3>

    <dl class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

        <!-- ==================== NOUVELLE STRUCTURE DE CARTE ROBUSTE ==================== -->
        <!-- Carte : Utilisateurs -->
        <div class="flex flex-col overflow-hidden rounded-lg bg-white dark:bg-zinc-900 shadow ring-1 ring-black/5 dark:ring-white/5">
            {{-- Partie supérieure avec le contenu textuel --}}
            <div class="flex-grow p-5 sm:p-6">
                <dt class="relative">
                    <div class="absolute rounded-md bg-blue-500 p-2.5">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.962a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5zM3.75 18.75a3 3 0 003.75 2.25A3 3 0 0011.25 18.75v-1.5c0-1.026.923-1.875 2.063-1.875h1.5c1.14 0 2.063.849 2.063 1.875v1.5z" />
                        </svg>
                    </div>
                    <p class="ml-12 truncate text-sm font-medium text-zinc-500 dark:text-zinc-400">Utilisateurs Total</p>
                </dt>
                <dd class="ml-12 flex items-baseline">
                    <p class="text-2xl font-semibold text-zinc-900 dark:text-zinc-50">{{ $stats['totalUsers'] }}</p>
                    <p class="ml-2 flex items-baseline text-sm font-semibold text-emerald-600">
                        <svg class="h-5 w-5 flex-shrink-0 self-center text-emerald-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.28 9.64a.75.75 0 01-1.06-1.06l5.25-5.25a.75.75 0 011.06 0l5.25 5.25a.75.75 0 11-1.06 1.06L10.75 5.612V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Augmentation de</span>
                        5.4%
                    </p>
                </dd>
            </div>
            {{-- Partie inférieure dédiée uniquement au graphique --}}
            <div class="h-[60px] w-full">
                <div id="chart-users"></div>
            </div>
        </div>

        <!-- Carte : Étudiants -->
        <div class="flex flex-col overflow-hidden rounded-lg bg-white dark:bg-zinc-900 shadow ring-1 ring-black/5 dark:ring-white/5">
            <div class="flex-grow p-5 sm:p-6">
                <dt>
                    <div class="absolute rounded-md bg-amber-500 p-2.5">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0l-3.976 5.197m0 0a59.927 59.927 0 01-2.182.84A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41m-18.118-5.197a50.697 50.697 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m0 0l-3.976-5.197m-6.423 7.303a3.75 3.75 0 01-4.242-4.242 3.75 3.75 0 014.242 4.242z" />
                        </svg>
                    </div>
                    <p class="ml-12 truncate text-sm font-medium text-zinc-500 dark:text-zinc-400">Étudiants</p>
                </dt>
                <dd class="ml-12 flex items-baseline">
                    <p class="text-2xl font-semibold text-zinc-900 dark:text-zinc-50">{{ $stats['totalStudents'] }}</p>
                    <p class="ml-2 flex items-baseline text-sm font-semibold text-emerald-600">
                        <svg class="h-5 w-5 flex-shrink-0 self-center text-emerald-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.28 9.64a.75.75 0 01-1.06-1.06l5.25-5.25a.75.75 0 011.06 0l5.25 5.25a.75.75 0 11-1.06 1.06L10.75 5.612V16.25A.75.75 0 0110 17z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Augmentation de</span>
                        8.2%
                    </p>
                </dd>
            </div>
            <div class="h-[60px] w-full">
                <div id="chart-students"></div>
            </div>
        </div>

        <!-- Carte : Enseignants -->
        <div class="flex flex-col overflow-hidden rounded-lg bg-white dark:bg-zinc-900 shadow ring-1 ring-black/5 dark:ring-white/5">
            <div class="flex-grow p-5 sm:p-6">
                <dt>
                    <div class="absolute rounded-md bg-rose-500 p-2.5">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.07a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.58a2.25 2.25 0 012.25-2.25h15A2.25 2.25 0 0122.5 8.58v4.07a2.25 2.25 0 01-2.25 2.25z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 6.75v1.5a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75v-1.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75z" />
                        </svg>
                    </div>
                    <p class="ml-12 truncate text-sm font-medium text-zinc-500 dark:text-zinc-400">Enseignants</p>
                </dt>
                <dd class="ml-12 flex items-baseline">
                    <p class="text-2xl font-semibold text-zinc-900 dark:text-zinc-50">{{ $stats['totalTeachers'] }}</p>
                    <p class="ml-2 flex items-baseline text-sm font-semibold text-emerald-600">
                        <svg class="h-5 w-5 flex-shrink-0 self-center text-emerald-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.28 9.64a.75.75 0 01-1.06-1.06l5.25-5.25a.75.75 0 011.06 0l5.25 5.25a.75.75 0 11-1.06 1.06L10.75 5.612V16.25A.75.75 0 0110 17z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Augmentation de</span>
                        1.1%
                    </p>
                </dd>
            </div>
            <div class="h-[60px] w-full">
                <div id="chart-teachers"></div>
            </div>
        </div>
        
        <!-- Carte : Documents -->
        <div class="flex flex-col overflow-hidden rounded-lg bg-white dark:bg-zinc-900 shadow ring-1 ring-black/5 dark:ring-white/5">
            <div class="flex-grow p-5 sm:p-6">
                <dt>
                    <div class="absolute rounded-md bg-emerald-500 p-2.5">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5 .124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m9.375 2.25c.621 0 1.125.504 1.125 1.125v3.375c0 .621-.504 1.125-1.125 1.125h-1.5a1.125 1.125 0 01-1.125-1.125v-3.375c0-.621.504-1.125 1.125-1.125h1.5z" />
                        </svg>
                    </div>
                    <p class="ml-12 truncate text-sm font-medium text-zinc-500 dark:text-zinc-400">Documents Partagés</p>
                </dt>
                <dd class="ml-12 flex items-baseline">
                    <p class="text-2xl font-semibold text-zinc-900 dark:text-zinc-50">{{ $stats['totalDocuments'] }}</p>
                    <p class="ml-2 flex items-baseline text-sm font-semibold text-emerald-600">
                        <svg class="h-5 w-5 flex-shrink-0 self-center text-emerald-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.28 9.64a.75.75 0 01-1.06-1.06l5.25-5.25a.75.75 0 011.06 0l5.25 5.25a.75.75 0 11-1.06 1.06L10.75 5.612V16.25A.75.75 0 0110 17z" clip-rule="evenodd" /></svg>
                        <span class="sr-only">Augmentation de</span>
                        10.2%
                    </p>
                </dd>
            </div>
            <div class="h-[60px] w-full">
                <div id="chart-documents"></div>
            </div>
        </div>
        
    </dl>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    
        const sparklineOptions = {
            chart: { 
                type: 'area', 
                height: 60, 
                sparkline: { enabled: true }, 
            },
            stroke: { curve: 'smooth', width: 2, },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
                    type: "vertical",
                    shadeIntensity: 0.5,
                    opacityFrom: 0.5,
                    opacityTo: 0.0,
                    stops: [0, 100]
                }
            },
            tooltip: { enabled: false },
            xaxis: { crosshairs: { width: 1 }, },
        };

        const usersData = [47, 45, 54, 38, 56, 24, 65];
        const studentsData = [10, 30, 20, 50, 40, 60, 55];
        const teachersData = [5, 6, 5, 7, 9, 10, 8];
        const documentsData = [12, 14, 2, 47, 42, 15, 47];

        new ApexCharts(document.querySelector("#chart-users"), {
            ...sparklineOptions,
            colors: ['#3B82F6'], // Bleu
            series: [{ name: 'Utilisateurs', data: usersData }]
        }).render();
        
        new ApexCharts(document.querySelector("#chart-students"), {
            ...sparklineOptions,
            colors: ['#F59E0B'], // Ambre
            series: [{ name: 'Étudiants', data: studentsData }]
        }).render();

        new ApexCharts(document.querySelector("#chart-teachers"), {
            ...sparklineOptions,
            colors: ['#F43F5E'], // Rose
            series: [{ name: 'Enseignants', data: teachersData }]
        }).render();

        new ApexCharts(document.querySelector("#chart-documents"), {
            ...sparklineOptions,
            colors: ['#10B981'], // Émeraude
            series: [{ name: 'Documents', data: documentsData }]
        }).render();
    });
</script>
@endpush
@endcan