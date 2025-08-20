{{-- Fichier : resources/views/dashboard.blade.php --}}

<x-layouts.app>
    {{-- ======================================================= --}}
    {{--  En-tête de la page                                      --}}
    {{-- ======================================================= --}}
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white">Tableau de bord</h2>
                <p class="mt-1 text-sm text-gray-400">Bienvenue, {{ auth()->user()->name }}. Voici un aperçu de l'activité.</p>
            </div>
            @can('is-admin-or-enseignant')
                <a href="{{ route('documents.upload') }}" 
                   class="mt-4 sm:mt-0 inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-sm font-semibold text-white transition-colors shadow-md"
                   wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                    <span>Ajouter un Document</span>
                </a>
            @endcan
        </div>
    </x-slot>

    {{-- ================================================== --}}
    {{--  Contenu principal de la page                     --}}
    {{-- ================================================== --}}
    <div class="space-y-10">

        <!-- Section Statistiques Admin (visible uniquement par les admins) -->
        @can('is-admin')
            {{-- Cette ligne inclut maintenant le bon fichier --}}
            @include('partials.admin-stats', ['stats' => $stats])
        @endcan

        <!-- Section pour les documents récents (pour tous les utilisateurs) -->
        <div>
            <h3 class="text-xl font-semibold text-white">Documents Récents</h3>
            <div class="mt-4 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-white/10 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead class="bg-gray-800">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Titre</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Auteur</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Date d'ajout</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6"><span class="sr-only">Télécharger</span></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-800 bg-gray-900">
                                    {{-- Mettez votre boucle @foreach pour les documents ici --}}
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-6">Exemple de Document</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">Exemple Auteur</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">Date</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-blue-400 hover:text-blue-300">Télécharger</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- On pousse le script depuis la page principale --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (document.querySelector('#chart-users')) {
                    initializeDashboardCharts();
                }
            });

            function initializeDashboardCharts() {
                ['#chart-users', '#chart-students', '#chart-teachers', '#chart-documents'].forEach(chartId => {
                    const chartEl = document.querySelector(chartId);
                    if (chartEl && chartEl.hasAttribute('data-apexcharts-id')) {
                        ApexCharts.exec(chartEl.getAttribute('data-apexcharts-id'), 'destroy');
                    }
                });
                const sparklineOptions = { chart: { type: 'area', height: 60, sparkline: { enabled: true }, }, stroke: { curve: 'smooth', width: 2, }, fill: { type: 'gradient', gradient: { shade: 'dark', type: "vertical", shadeIntensity: 0.5, opacityFrom: 0.3, opacityTo: 0.0, stops: [0, 100]}}, tooltip: { enabled: false }, xaxis: { crosshairs: { width: 1 }, }, };
                const usersData = [47, 45, 54, 38, 56, 24, 65]; const studentsData = [10, 30, 20, 50, 40, 60, 55]; const teachersData = [5, 6, 5, 7, 9, 10, 8]; const documentsData = [12, 14, 2, 47, 42, 15, 47];
                new ApexCharts(document.querySelector("#chart-users"), { ...sparklineOptions, colors: ['#2563EB'], series: [{ name: 'Utilisateurs', data: usersData }] }).render();
                new ApexCharts(document.querySelector("#chart-students"), { ...sparklineOptions, colors: ['#D97706'], series: [{ name: 'Étudiants', data: studentsData }] }).render();
                new ApexCharts(document.querySelector("#chart-teachers"), { ...sparklineOptions, colors: ['#E11D48'], series: [{ name: 'Enseignants', data: teachersData }] }).render();
                new ApexCharts(document.querySelector("#chart-documents"), { ...sparklineOptions, colors: ['#059669'], series: [{ name: 'Documents', data: documentsData }] }).render();
            }
        </script>
    @endpush
</x-layouts.app>