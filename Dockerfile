FROM php:8.2-apache

RUN apt-get update -y && apt-get install -y openssl libzip-dev zip unzip git
RUN apt-get install -y iputils-ping
RUN a2enmod rewrite


RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql
RUN apt-get install npm -y


ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN sed -i '/^;extension=pdo_pgsql/s/^;//' /usr/local/etc/php/php.ini-development
RUN sed -i '/^;extension=pgsql/s/^;//' /usr/local/etc/php/php.ini-development
RUN sed -i '/^;extension=pdo_pgsql/s/^;//' /usr/local/etc/php/php.ini-production
RUN sed -i '/^;extension=pgsql/s/^;//' /usr/local/etc/php/php.ini-production

WORKDIR /var/www/html
COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN npm install

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8000

#CMD ["php", "artisan", "serve"]
