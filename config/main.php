<?php
/**
 * User: cjimenez
 * Date: 04/11/16 22:55
 */
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/Config.php";

use Pimple\Container;

/**
 * DI
 */
$di = new Container();
$di['config'] = function() {
    $config = new Config();
    $config->active = true;
    $config->projectName = 'ai';
    $config->serviceList = ['memcached'];
    return $config;
};

/**
 * Autoloader ******************************
 */
spl_autoload_extensions(".php"); // comma-separated list
spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    require_once __DIR__."/../Library/$className.php";
});
