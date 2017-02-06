<?php
/**
 * User: cjimenez
 * Date: 21/11/16 11:06
 */

namespace Service;

class Fpm extends ServiceGeneric {

    public function getYml()
    {
        $config = $this->di['config'];

        return $config->projectName . '-'. $this->getName() . ':
  build: .
  dockerfile: vendor/ceji/dockme/php-fpm/Dockerfile
  container_name: ' . $config->projectName . '-'. $this->getName() . '
  volumes:
      - ..:/var/www/' . $config->projectName . '
      - ./php-fpm/php-ini-overrides.ini:/etc/php5/fpm/conf.d/99-overrides.ini
' . "\n";
    }
}