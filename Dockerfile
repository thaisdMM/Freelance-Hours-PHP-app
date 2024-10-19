# Use a imagem oficial do PHP
FROM php:8.2-fpm

# Instalar extensões necessárias
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libzip-dev unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip

# Definir o diretório de trabalho
WORKDIR /var/www

# Copiar os arquivos do seu projeto para o contêiner
COPY . .

# Instalar as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install

# Expor a porta que a aplicação irá rodar
EXPOSE 8000

# Comando para iniciar a aplicação
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]