import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/citrakucostum.css",
                "resources/js/citrakucostum.js",
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    // Mengelompokkan semua modul dari node_modules ke dalam chunk terpisah
                    if (id.includes("node_modules")) {
                        return id.split("node_modules/")[1].split("/")[0]; // Nama modul
                    }
                },
            },
        },
    },
});
