# Este es el archivo php/Dockerfile
FROM php:7.2.7-fpm-alpine3.7
# Obtiene la información del directorio src que se encuentra en la raiz miweb/
COPY ./src/ /var/www/html/
# Actualiza los paquetes
RUN apk update; \
    apk upgrade;
# Instala mysqli para facilitar las conexiones con MySQL
RUN docker-php-ext-install mysqli
