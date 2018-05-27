FROM php:7.1-apache-jessie

RUN apt-get update

# Change workdir
ENV APACHE_DOCUMENT_ROOT /var/www/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www

# Install postgresql driver
RUN apt-get install -y libpq-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql

# Enable mod_rewrite
RUN a2enmod rewrite

# Install Git and Composer
RUN apt-get install -y git
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --filename=composer --install-dir=/usr/bin
