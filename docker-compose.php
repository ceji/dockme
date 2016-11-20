<?php

require_once "config/main.php";


if ($mainConfig['active']) {
    echo '
###############################################################################
#                          Generated on phpdocker.io
# To run : php docker-compose.php | sudo docker-compose -f - up -d
###############################################################################

' . $mainConfig['name'] . '-memcached:
  image: phpdockerio/memcached:latest
  container_name: ' . $mainConfig['name'] . '-memcached

' . $mainConfig['name'] . '-redis:
  image: phpdockerio/redis:latest
  container_name: ' . $mainConfig['name'] . '-redis

' . $mainConfig['name'] . '-mysql:
  image: mysql:5.7
  container_name: ' . $mainConfig['name'] . '-mysql
  environment:
    - MYSQL_ROOT_PASSWORD=%C3dr1c%
    - MYSQL_DATABASE=aidb
    - MYSQL_USER=aiadmin
    - MYSQL_PASSWORD=%C3dr1c%

' . $mainConfig['name'] . '-webserver:
  image: phpdockerio/nginx:latest
  container_name: ' . $mainConfig['name'] . '-webserver
  volumes:
      - ..:/var/www/ai
      - ./nginx/nginx.conf:/etc/nginx/conf.d/default.conf
  ports:
   - "8383:80"
  links:
   - ' . $mainConfig['name'] . '-php-fpm

' . $mainConfig['name'] . '-php-fpm:
  build: .
  dockerfile: php-fpm/Dockerfile
  container_name: ' . $mainConfig['name'] . '-php-fpm
  volumes:
    - ..:/var/www/ai
    - ./php-fpm/php-ini-overrides.ini:/etc/php5/fpm/conf.d/99-overrides.ini
  links:
    - ' . $mainConfig['name'] . '-memcached
    - ' . $mainConfig['name'] . '-mysql
    - ' . $mainConfig['name'] . '-redis
';
}