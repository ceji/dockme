<?php

require_once "config/Config.php";

$config = $di['config'];
if ($config->active) {
    $serviceManager = new \ServiceManager($config->projectName, $di);
    $serviceManager->addService('Memcached');
    $serviceManager->addService('Redis');
    $serviceManager->addService('Mysql');
    $serviceManager->addService('Nginx');
    echo $serviceManager->getYml();
}