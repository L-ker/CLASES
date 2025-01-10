FROM php:8.4-apache
ENV debian_frontend=noninteractive

RUN apt update
RUN apt install -y nano vim

RUN echo "<Directory /var/www/html>" >> /etc/apache2/apache2.conf
RUN echo " Options +Indexes" >> /etc/apache2/apache2.conf
RUN echo "</Directory>" >> /etc/apache2/apache2.conf

RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

RUN echo "zend_extension =$(find /usr/local/lib/php/extensions -name xdebug.so)" >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

EXPOSE 80