<?php

require_once "config/main.php";

$config = $di['config'];
if ($config->active) {
    $serviceManager = new \ServiceManager($config->projectName, $di);
    $serviceManager->addService('Memcached');
    $serviceManager->addService('Redis');
    echo $serviceManager->getYml();
}