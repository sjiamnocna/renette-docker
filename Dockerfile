FROM php:8.0.9-fpm-alpine

WORKDIR /var/www

RUN apk update \
RUN apk add \
	build-base \
	vim

RUN docker-php-ext-install pdo_mysql

RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www

USER www

EXPOSE 9000

