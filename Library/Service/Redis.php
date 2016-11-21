<?php
/**
 * User: cjimenez
 * Date: 21/11/16 11:06
 */

namespace Service;

class Redis extends ServiceGeneric {

    public function getYml()
    {
        $config = $this->di['config'];

        return $config->projectName . '-redis:
  image: phpdockerio/redis:latest
  container_name: ' . $config->projectName . '-redis' .
            "\n";
    }

}