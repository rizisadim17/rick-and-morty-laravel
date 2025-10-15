import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1',  // Use localhost IP instead of ::
        port: 5174,
        hmr: {
            host: 'localhost',  // Ensure HMR uses localhost too
        },
    },
});