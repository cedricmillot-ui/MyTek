# Utilise PHP 8.4 avec PHP-FPM
FROM php:8.4-fpm

# Installation des dépendances système + LibGD pour le traitement d'images (SEO)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    && docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install pdo pdo_mysql zip gd opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Répertoire de travail
WORKDIR /var/www/html

# Copie des fichiers
COPY . /var/www/html

# Permissions pour www-data
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configuration PHP orientée Production & SEO (Vitesse)
RUN echo "display_errors=Off" > /usr/local/etc/php/conf.d/99-prod.ini \
    && echo "expose_php=Off" >> /usr/local/etc/php/conf.d/99-prod.ini \
    && echo "memory_limit=256M" >> /usr/local/etc/php/conf.d/99-prod.ini \
    && echo "upload_max_filesize=10M" >> /usr/local/etc/php/conf.d/99-prod.ini \
    # Configuration OPcache cruciale pour le temps de réponse (TTFB)
    && echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/99-prod.ini \
    && echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/99-prod.ini \
    && echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/99-prod.ini \
    && echo "opcache.max_accelerated_files=4000" >> /usr/local/etc/php/conf.d/99-prod.ini \
    && echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/99-prod.ini