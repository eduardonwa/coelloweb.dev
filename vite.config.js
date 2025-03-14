import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/filament/admin/theme.css',
                'resources/js/animaciones.js',
                'resources/js/animaciones-acerca.js',
                'resources/js/animaciones-sales-page.js',
            ],
            refresh: true,
        }),
    ],
});
