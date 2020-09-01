FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
 libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
	&& docker-php-ext-install pdo_mysql \
	&& pecl install xdebug \ curl \ dom  \ intl \
	 mbstring \ pcre \ mbstring \ fileinfo \ json \
	  libpng-dev \ libjpeg-dev \
    && docker-php-ext-enable xdebug


RUN apt-get install -y libzip-dev

ADD ./php.ini /usr/local/etc/php/php.ini

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data


