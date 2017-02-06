<?php
/**
 * User: cjimenez
 * Date: 21/11/16 16:22
 */

$loader = require_once __DIR__ . "/../../../autoload.php";


use Pimple\Container;


class Config {

    /**
     * @var boolean
     */
    public $active;

    /**
     * @var String
     */
    public $projectName;

    /**
     * @var Array
     */
    public $availableServiceList;
}







/**
 * DI
 */
$di = new Container();
$di['config'] = function() {
    $config = new Config();
    $config->active = true;
    $config->projectName = 'ai';
    $config->availableServiceList = [
        'Memcached' => [],
        'Redis' => [],
        'Mysql' => [
            'ROOT_PASSWORD' => 'azerty',
            'DATABASE' => $config->projectName,
            'USER' => 'userme',
            'PASSWORD' => 'passme'
        ],
        'Nginx' => [
            'port_local' => 8383,
            'port_docker' => 80,
            'linkedTo' => [
                'redis'
            ]
        ],
        'Fpm' => [
            'linkedTo' => [
                'redis',
                'memcached',
                'mysql'
            ]
        ]
    ];
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
