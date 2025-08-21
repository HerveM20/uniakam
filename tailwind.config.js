/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],

    theme: {
        extend: {
            // =======================================================
            //  NOUVEAU : PALETTE DE COULEURS OFFICIELLE DE L'UNIKAM
            // =======================================================
            colors: {
                unikam: {
                    'green': '#829d2d',       // Le vert principal (boutons, liens actifs)
                    'green-dark': '#6e8626',  // Une version plus foncée pour les survols (hover)
                    'gray': {
                        'DEFAULT': '#4a4a4a', // Le gris foncé principal (barre de nav)
                        'light': '#f0f0f0',   // Pour les fonds clairs
                        'dark': '#333333',    // Pour les bordures ou survols sombres
                    },
                    'blue': '#359cde',        // Le bleu ciel du logo
                    'red': '#e20613',         // Le rouge vif du logo
                }
            }
        },
    },

    plugins: [],
}