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
    server: {
        host: '0.0.0.0', // Allows access from any network interface
        port: 5173,      // Use this port or change as needed
        hmr: {
            host: '192.168.8.101', // Replace with your local IP address
        },
    },
});
