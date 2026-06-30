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

# Dar permisos correctos a las carpetas de almacenamiento de Laravel
RUN chown -R application:application /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer el puerto por defecto
EXPOSE 80