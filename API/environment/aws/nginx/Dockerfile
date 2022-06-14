FROM nginx:1.17-alpine

ADD ./API/environment/aws/nginx/default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html/gware

ADD ./API/source /var/www/html/gware

RUN chmod -R 777 /var/www/html/gware

RUN chmod -R 777 /var/www/html/gware/*

EXPOSE 80

EXPOSE 443