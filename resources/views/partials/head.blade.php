<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<!-- Favicons -->
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<!-- Fonts : Inter pour une esthétique professionnelle et moderne -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- ============================================================= -->
<!--   AJOUT REQUIS : Bibliothèque ApexCharts pour les graphiques   -->
<!-- ============================================================= -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts" defer></script>

<!-- Vite Assets -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Flux UI Appearance -->
@fluxAppearance