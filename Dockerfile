FROM php:7.4.29-zts

COPY app /usr/src/app
WORKDIR /usr/src/app
EXPOSE 80

RUN rm /bin/sh && ln -s /bin/bash /bin/sh

RUN apt-get update --fix-missing
RUN apt-get install -y build-essential libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev

RUN  docker-php-ext-install gd

RUN docker-php-ext-install mysqli pdo pdo_mysql
CMD [ "php", "-t", "/usr/src/app", "-S", "0.0.0.0:80" ]