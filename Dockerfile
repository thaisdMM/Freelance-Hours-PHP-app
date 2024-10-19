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

# Copiar o código da aplicação
WORKDIR /var/www
COPY . .

# Instalar dependências do PHP
RUN composer install

# Instalar dependências do Node.js
RUN npm install

# Gerar os arquivos de build do Tailwind CSS
RUN npm run build

# Expor a porta 8000
EXPOSE 8000

# Comando para rodar o PHP e o Tailwind
CMD npm run dev & php artisan serve --host 0.0.0.0 --port=${PORT:-8000}