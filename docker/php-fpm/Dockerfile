FROM php:8.0-fpm

RUN apt-get update

RUN apt-get install -y libssl-dev curl git
RUN apt-get install -y nginx supervisor curl
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Configure nginx
COPY ../../config/nginx.conf /etc/nginx/nginx.conf

# Setup document root
WORKDIR /var/www/wemovies

# Configure supervisord
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

HEALTHCHECK --timeout=10s CMD curl --silent --fail http://127.0.0.1:8080/fpm-ping
