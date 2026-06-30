FROM webdevops/php-nginx:8.3-alpine

# Configurar el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copiar todo el código de nuestro Laravel al servidor web
COPY . .

# Configurar variables de entorno indispensables para producción en Laravel
ENV APP_ENV=production
ENV WEB_DOCUMENT_ROOT=/var/www/html/public
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instalar NodeJS, npm, dependencias de PHP (Composer) y compilar los estilos de Tailwind v4
RUN apk add --no-cache nodejs npm \
    && composer install --no-dev --optimize-autoloader \
    && npm install \
    && npm run build

# --- NUEVO: Crear la base de datos SQLite vacía y ejecutar migraciones si es necesario ---
RUN mkdir -p database \
    && touch database/database.sqlite \
    && php artisan migrate --force

# Dar permisos correctos a las carpetas de almacenamiento y a la base de datos
RUN chown -R application:application /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Exponer el puerto por defecto
EXPOSE 80