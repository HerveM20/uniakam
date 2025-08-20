<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- TITRE CLAIR -->
    <title>UNIKAM Share - Votre Bibliothèque Académique en Ligne</title>

    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['Inter', 'sans-serif'],
            },
            colors: {
              brand: {
                primary: '#3B82F6',
                dark: '#0F172A',
                light: '#F9FAFB',
                secondary: '#9CA3AF',
              },
            }
          }
        }
      }
    </script>

    <style>
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .gradient-bg {
            background: radial-gradient(circle at 25% 25%, rgba(59, 130, 246, 0.12), transparent 40%),
                        radial-gradient(circle at 75% 75%, rgba(59, 130, 246, 0.12), transparent 40%),
                        #0F172A;
        }
        .btn-primary {
            transition: all 0.25s ease-in-out;
        }
        .btn-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.35);
        }
    </style>
</head>
<body class="bg-brand-dark text-brand-light font-sans">
    <div class="relative min-h-screen w-full flex flex-col items-center justify-center p-4 overflow-hidden gradient-bg">

        <!-- HEADER -->
        @if (Route::has('login'))
            <header class="absolute top-0 right-0 p-6 z-10">
                <nav class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">
                            Mon Espace
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">
                            Se Connecter
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-brand-primary rounded-xl shadow-md btn-primary">
                                S'inscrire
                            </a>
                        @endif
                    @endauth
                </nav>
            </header>
        @endif

        <!-- MAIN CONTENT -->
        <main class="w-full max-w-6xl mx-auto flex flex-col lg:flex-row items-center gap-12 text-center lg:text-left z-10">
            <!-- Texte -->
            <div class="flex-1">
                <h1 class="text-4xl md:text-6xl font-bold tracking-tight text-white mb-6 leading-tight">
                    Le Savoir de l'UNIKAM, <br class="hidden md:block"/> Simplifié.
                </h1>
                <p class="text-lg md:text-xl text-brand-secondary mb-8 max-w-xl mx-auto lg:mx-0">
                    Accédez instantanément à vos documents académiques : notes de cours, syllabus, anciens examens et mémoires. 
                    Une plateforme unique pour étudier plus intelligemment.
                </p>
                <div class="flex flex-col sm:flex-row justify-center lg:justify-start items-center gap-4">
                    <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-white bg-brand-primary rounded-xl shadow-lg btn-primary">
                        Accéder à la plateforme
                    </a>
                    <a href="#features" class="w-full sm:w-auto text-base font-medium text-gray-300 hover:text-white transition-colors">
                        Comment ça marche ?
                    </a>
                </div>
            </div>

            <!-- Illustration -->
            <div class="flex-1 flex items-center justify-center p-8">
                <svg class="w-64 h-auto text-brand-primary opacity-90" xmlns="http://www.w3.org/2000/svg" fill="none" 
                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 
                             6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 
                             3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 
                             2.292m0-14.25v14.25" />
                </svg>
            </div>
        </main>

        <!-- FOOTER AVEC SIGNATURE -->
        <footer class="absolute bottom-0 w-full text-center py-4 text-sm text-gray-400 border-t border-gray-700">
            © {{ date('Y') }} UNIKAM Share — Conçu avec passion par <span class="text-brand-primary font-semibold">Hervé Mukena</span>.
        </footer>
    </div>
</body>
</html>
