# Usar la imagen oficial de PHP CLI desde Docker Hub
FROM php:8.0-cli

# Actualizar la lista de paquetes
RUN apt-get update

# Descargar e instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir el directorio de trabajo
WORKDIR /app

# Copiar los archivos de la aplicación al contenedor
COPY . /app

# Instalar las dependencias de la aplicación con Composer
RUN composer install

# Generar el autoloader con Composer
RUN composer dump-autoload

# Ejecutar el script PHP cuando se inicie el contenedor
CMD [ "php", "./your-script.php" ]