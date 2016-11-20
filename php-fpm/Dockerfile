FROM phpdockerio/php56-fpm:latest

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php5-memcached php5-mysql php5-redis php5-odbc \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install phalcon
RUN curl -s https://packagecloud.io/install/repositories/phalcon/stable/script.deb.sh | bash \
    && apt-get update \
    && apt-get install php5-phalcon \
    && php5enmod phalcon \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

WORKDIR "/var/www/ai"