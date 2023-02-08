FROM php:8.1-apache as php-base

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Dependencies
RUN apt-get update -y && apt-get install -y nano ssh libpng-dev libmagickwand-dev libjpeg-dev libmemcached-dev zlib1g-dev libzip-dev git unzip subversion ca-certificates libicu-dev libxml2-dev libmcrypt-dev && apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/

# PHP Extensions - PECL
RUN pecl install imagick memcached mcrypt-1.0.4 && docker-php-ext-enable imagick memcached 

# PHP Extensions - docker-php-ext-install
RUN docker-php-ext-install zip gd mysqli exif pdo pdo_mysql opcache intl soap

RUN a2enmod rewrite headers

RUN a2enmod ssl
# PHP Extensions - docker-php-ext-configure
RUN docker-php-ext-configure intl

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - 
RUN apt-get install -y nodejs

# PHP Tools
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

