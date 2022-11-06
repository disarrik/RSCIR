FROM php:apache
RUN docker-php-ext-install mysqli  && \
    a2enmod authn_dbd && \
    apt-get update && \
    apt-get install -y libaprutil1-dbd-mysql
RUN pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis
RUN apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev
RUN pecl install mongodb && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable mongodb
RUN a2enmod rewrite
RUN mkdir /upload && chmod 777 /upload 
COPY apache/conf/php.ini /usr/local/etc/php/conf.d 