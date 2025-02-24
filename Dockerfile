FROM alpine:3.19

WORKDIR /usr/share/nginx/html

RUN apk update && apk upgrade
RUN apk add bash
RUN apk add nginx
RUN apk add --no-cache shadow
RUN apk add php82 php82-fpm php82-opcache php82-common php82-pdo php82-pdo_mysql php82-mysqli php82-xml php82-openssl
RUN apk add php82-gd php82-curl php82-phar php82-zip php82-dom php82-session php82-mbstring php82-exif php82-pcntl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
#RUN groupadd -g 1000 www
#RUN useradd -u 1000 -ms /bin/bash -g www www


COPY server/etc/nginx /etc/nginx
COPY server/etc/php /etc/php82
COPY . /usr/share/nginx/html

RUN mkdir /var/run/php

# Change current user to www
USER root

EXPOSE 80
EXPOSE 443

STOPSIGNAL SIGTERM

CMD ["/bin/bash", "-c", "php-fpm82 && chmod 777 /var/run/php/php8.2-fpm.sock && chmod 755 /usr/share/nginx/html/* && nginx -g 'daemon off;'"]
#CMD ["/bin/bash", "-c", "php-fpm82 && nginx -g 'daemon off;'"]
