FROM php:8.0.9-fpm-alpine

WORKDIR /var/www

RUN apk update \
RUN apk add \
	build-base \
	vim

# FIX for PDO-PGSQL
RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql

RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www

USER www

EXPOSE 9000

