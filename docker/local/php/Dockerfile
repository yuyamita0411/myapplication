FROM php:8.0.7-fpm-alpine3.13

#pdoインストール
RUN docker-php-ext-install pdo_mysql

#composerインストール
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install zip gd

RUN mkdir -p /var/www/html/gware

WORKDIR /var/www/html/gware

#RUN composer update

RUN chmod -R 777 /var/www/html/gware