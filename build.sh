#!/usr/bin/env bash
# Salir inmediatamente si un comando falla
set -o errexit

# Instalar dependencias de PHP y JavaScript
composer install --no-dev --optimize-autoloader
npm install

# Compilar los archivos de Vite (Tailwind v4 y JS) para producción
npm run build

# Limpiar cachés de Laravel para optimizar la velocidad
php artisan config:cache
php artisan route:cache
php artisan view:cache