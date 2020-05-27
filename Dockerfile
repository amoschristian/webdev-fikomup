FROM php:7-apache
RUN docker-php-ext-install mysqli
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN a2enmod rewrite

# Copy application source
COPY ./ /var/www/public
RUN chown -Rf www-data:www-data /var/www

CMD ["start-apache"]

