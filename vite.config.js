import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/status.css',
                'resources/js/status.js',
            ],
            refresh: true,
        }),
    ],
});
