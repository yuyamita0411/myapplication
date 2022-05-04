FROM php:8.0.7-fpm-alpine3.13

RUN chmod 777 .
#pdoインストール
RUN docker-php-ext-install pdo_mysql

#composerインストール
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN mkdir -p /var/www/html/gware

ADD ./source /var/www/html/gware

RUN chmod -R 777 /var/www/html/gware/*