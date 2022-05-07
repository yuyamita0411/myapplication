FROM nginx
RUN mkdir /var/www

ADD ./VUE/environment/local/server/nginx/nginx.conf /etc/nginx/nginx.conf
ADD ./VUE/environment/local/logs/nginx/access.log /var/log/nginx/access.log
ADD ./VUE/environment/local/logs/nginx/error.log /var/log/nginx/error.log
ADD ./VUE/vue_js/dist /var/www
ADD ./VUE/environment/local/ssl /etc/nginx/ssl

CMD ["nginx", "-g", "daemon off;", "-c", "/etc/nginx/nginx.conf"]