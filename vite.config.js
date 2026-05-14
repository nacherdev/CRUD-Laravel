import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        // '0.0.0.0' permite que Vite sea accesible desde cualquier IP de tu PC
        host: '0.0.0.0', 
        port: 5173,
        strictPort: true,
        hmr: {
            // Aquí 'localhost' funciona para ti, pero el 'host: 0.0.0.0' 
            // permite que otros dispositivos reciban los assets.
            host: 'localhost', 
        },
        watch: {
            usePolling: true, // Recomendado para Docker en Windows/Mac para que el refresco sea instantáneo
            ignored: ['**/storage/framework/views/**'],
        },
    },
});