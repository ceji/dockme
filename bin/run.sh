#!/bin/bash

php init.php
php docker-compose.php | sudo docker-compose -f - up -d