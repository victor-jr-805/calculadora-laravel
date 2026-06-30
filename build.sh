#!/usr/bin/env bash
# Salir inmediatamente si un comando falla
set -o errexit

# 🌟 TRUCO RENDER: Descargar una copia local de Composer en la raíz
curl -sS https://getcomposer.org/installer | php

# Instalar dependencias usando la copia local que acabamos de descargar (php composer.phar)
php composer.phar install --no-dev --optimize-autoloader

# Instalar dependencias de JavaScript y compilar Vite (Tailwind v4)
npm install
npm run build

# Limpiar cachés de Laravel para optimizar la velocidad en internet
php artisan config:cache
php artisan route:cache
php artisan view:cache