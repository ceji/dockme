<?php

require_once "config/main.php";

foreach ($mainConfig['services'] as $service) {
    shell_exec('sudo docker rm -f ' . $mainConfig['name'] . '-' . $service);
}