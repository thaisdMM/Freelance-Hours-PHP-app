# Use a imagem base do PHP com Node.js e NPM instalados
FROM php:8.2-fpm

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    nodejs \
    npm

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Defina o diretório de trabalho
WORKDIR /var/www

# Copiar o código da aplicação
COPY . .

# Instalar dependências do PHP
RUN composer install --no-dev --optimize-autoloader

# Instalar dependências do Node.js
RUN npm install

# Gerar os arquivos de build do Vite e Tailwind CSS
RUN npm run build

# Expor a porta 8000
EXPOSE 8000

# Rodar migrations e seeders (opcional)
RUN php artisan migrate --force
#RUN php artisan db:seed --force

# Comando para iniciar o servidor PHP
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]