FROM richarvey/nginx-php-fpm:3.1.6

# Copiar todo el código de nuestro Laravel al servidor web
COPY . /var/www/html

# Configurar variables del contenedor para que use la carpeta /public de Laravel
ENV APP_ENV=production
ENV WEBROOT=/var/www/html/public
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instalar NodeJS, npm, dependencias de PHP y compilar los estilos de Tailwind v4
RUN apk add --no-cache nodejs npm \
    && composer install --no-dev --optimize-autoloader \
    && npm install \
    && npm run build

# Exponer el puerto 80 para internet
EXPOSE 80