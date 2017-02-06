<?php

require_once "config/Config.php";

/**
 * @var Config $config
 */
$config = $di['config'];

if (count($argv) > 1) {

    array_shift($argv);

    $serviceManager = new \ServiceManager($config->projectName, $di);
    foreach($argv as $serviceName) {
        if (!isset($config->availableServiceList[$serviceName])) {
            throw new Exception("The Service $serviceName does not exists.");
        }
        $serviceManager->addService($serviceName);
    }
    echo $serviceManager->getYml();
} else {
    if ($config->active) {
        $serviceManager = new \ServiceManager($config->projectName, $di);
        $serviceManager->addService('Memcached');
        $serviceManager->addService('Redis');
        $serviceManager->addService('Mysql');
        $serviceManager->addService('Nginx');
        $serviceManager->addService('Fpm');
        echo $serviceManager->getYml();
    }
}


