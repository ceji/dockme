<?php
/**
 * User: cjimenez
 * Date: 04/11/16 22:55
 */

require_once "vendor/autoload.php";
require_once "services.php";

$mainConfig = [
    'active' => true,
    'name' => 'ai'
];

$mainConfig = array_merge_recursive($mainConfig, $servicesConfig);