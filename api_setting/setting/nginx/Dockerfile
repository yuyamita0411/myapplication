FROM nginx:1.17-alpine

ADD ./default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html/gware

ADD ./api_source /var/www/html/gware

RUN chmod -R 777 /var/www/html/gware

EXPOSE 80

EXPOSE 443