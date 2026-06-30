import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
    // AGREGA ESTE BLOQUE CORREGIDO ABAJO DE LOS PLUGINS:
    server: {
        host: "127.0.0.1", // Fuerza a Vite a usar la IP local rápida de Windows
        hmr: {
            host: "127.0.0.1", // Evita que se quede buscando "localhost" eternamente
        },
    },
});
