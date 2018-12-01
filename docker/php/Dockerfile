FROM php:7.2-fpm

WORKDIR /var/www

# Install cron & supervisor
RUN apt-get update && apt-get -y install cron
RUN apt-get -y install supervisor && \
  mkdir -p /var/log/supervisor && \
  mkdir -p /etc/supervisor/conf.d
RUN apt-get install -y zlib1g-dev zip curl git libcurl3 libcurl3-gnutls

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring

RUN apt-get autoremove

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer && chmod +sx /usr/local/bin/composer

# Copy cronjobs file to the path
COPY cronjobs /etc/cron.d/cronjobs
# Apply permissions
RUN chmod 0644 /etc/cron.d/cronjobs
# Run crontab
RUN crontab /etc/cron.d/cronjobs
# Create log file where the result of running the cronjobs will be saved
RUN touch /var/log/cron.log
# Copy supervisord
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80

ENTRYPOINT ["/usr/bin/supervisord"]
