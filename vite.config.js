import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite"; // Plugin vital

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true, // Esto hace que el navegador se actualice al guardar
        }),
        tailwindcss({
            // CONFIGURACIÓN CLAVE PARA EL DISEÑO OSCURO ESMERALDA
            config: {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            // Definimos el color 'emerald' exacto de la diapositiva
                            emerald: {
                                400: "#10b981",
                                500: "#059669",
                            },
                        },
                    },
                },
            },
        }),
    ],
});
