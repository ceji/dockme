<?php
/**
 * User: cjimenez
 * Date: 21/11/16 11:06
 */

namespace Service;

class Nginx extends ServiceGeneric {

    public function getYml()
    {
        $config = $this->di['config'];
        $nginxConfig = $config->availableServiceList['nginx'];

        return $config->projectName . '-nginx:
  image: phpdockerio/nginx:latest
  container_name: ' . $config->projectName . '-nginx
  volumes:
      - ..:/var/www/' . $config->projectName . '
      - ./nginx/nginx.conf:/etc/nginx/conf.d/default.conf
  ports:
   - "' . $nginxConfig['port_local'] . ':' . $nginxConfig['port_docker'] . '"
' . "\n";
    }
}