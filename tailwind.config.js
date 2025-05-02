import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                azul: {
                  escuro: '#1E3A8A',
                  celeste: '#00BFFF',
                  claro: '#E0F7FA', /* Azul claro suave */
                },
                verde: {
                  bandeira: '#1B5E20',
                  folha: '#228B22',
                },
                amarelo: {
                  ouro: '#FFB300',
                  sol: '#FFD700',
                },
                vermelho: {
                  suave: '#EF4444',
                  vivo: '#E63946',
                },
                cinza: {
                  claro: '#F9FAFB',
                  medio: '#6B7280',
                },
                bege: {
                  claro: '#FAF3E0',
                },
              },
        },
    },

    plugins: [forms],
};
