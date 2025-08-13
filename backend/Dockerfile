FROM php:7.4-apache

# Instalar dependências do sistema e extensões necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Xdebug para debugging
RUN pecl install xdebug-3.1.6 \
    && docker-php-ext-enable xdebug

# Configurar Xdebug
RUN echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ativar módulos do Apache necessários
RUN a2enmod rewrite headers

# Configuração do Apache
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf

# Definir permissões corretas
RUN chown -R www-data:www-data /var/www/html

# Expor portas
EXPOSE 80 8000
