<?php
/**
 * User: cjimenez
 * Date: 21/11/16 11:06
 */

namespace Service;

class Mysql extends ServiceGeneric {

    public function getYml()
    {
        $config = $this->di['config'];
        $mysqlConfig = $config->availableServiceList['mysql'];

        return $config->projectName . '-'. $this->getName() . ':
  image: mysql:5.7
  container_name: ' . $config->projectName . '-'. $this->getName() . '
  environment:
    - MYSQL_ROOT_PASSWORD=' . $mysqlConfig['ROOT_PASSWORD'] . '
    - MYSQL_DATABASE=' . $mysqlConfig['DATABASE'] . '
    - MYSQL_USER=' . $mysqlConfig['USER'] . '
    - MYSQL_PASSWORD=' . $mysqlConfig['PASSWORD'] . '
' . "\n";
    }
}