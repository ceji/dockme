#!/bin/bash

echo "Init"
php vendor/ceji/dockme/init.php

echo "Docker compose"
php vendor/ceji/dockme/docker-compose.php | sudo docker-compose -f - up -d