<?php

require_once "config/main.php";
require_once "config/Config.php";



$config = $di['config'];

foreach ($config->serviceList as $service) {
    shell_exec('sudo docker rm -f ' . $config->projectName . '-' . $service);
}