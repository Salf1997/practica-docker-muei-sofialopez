# Este es el archivo apache/Dockerfile
FROM httpd:2.4.33-alpine
# Actualiza los paquetes
RUN apk update; \
    apk upgrade;
# Copia el archivo de configuración apache
COPY apache.conf /usr/local/apache2/conf/apache.conf
# Obtiene la información del directorio src que se encuentra en la raiz miweb/
COPY ./src/ /var/www/html/
# Corre el archivo de configuracion previamente copiado
RUN echo "Include /usr/local/apache2/conf/apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
