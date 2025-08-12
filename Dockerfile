FROM php:7.4-apache

# Instalar dependências do sistema e extensões necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Ativar mod_rewrite
RUN a2enmod rewrite

# Configuração do Apache (opcional)
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf
