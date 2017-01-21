#!/bin/bash

echo "Dockerisation in progress.........."
php vendor/ceji/dockme/init.php >> /dev/null
php vendor/ceji/dockme/docker-compose.php | sudo docker-compose -f - up -d
echo "Here are the Docker containers created :"
sudo docker ps

php vendor/ceji/dockme/docker-compose.php