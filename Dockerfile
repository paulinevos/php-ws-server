FROM php:8.1-cli

COPY . /var/www
WORKDIR /var/www

EXPOSE 80

ENTRYPOINT php ./start.php