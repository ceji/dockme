<?php
/**
 * User: cjimenez
 * Date: 21/11/16 11:03
 */

namespace Service;


use Pimple\Container;

class ServiceGeneric {

    /**
     * @var Container
     */
    public $di;

    /**
     * Returns service name
     *
     * @return string
     */
    public function getName() {
        return str_replace('service\\', '', strtolower(get_class($this)));
    }

    public function __construct(Container $di)
    {
        $this->di = $di;
    }

    /**
     * Returns a string containing the link with other services
     *
     * @param array $serviceList List of services available
     *
     * @return string
     */
    public function getYmlLinks(array $serviceList)
    {
        $config = $this->di['config'];
        $serviceConfig = $config->availableServiceList[$this->getName()];

        // List services to link to
        $linkServicesHash = [];
        if (isset($serviceConfig['linkedTo'])) {
            foreach($serviceConfig['linkedTo'] as $serviceToLinkTo) {
                if (isset($serviceList[$serviceToLinkTo])) {
                    $linkServicesHash[] = $serviceToLinkTo;
                }
            }
        }

        // Generate YML
        $linkYml = '';
        if (count($linkServicesHash) > 0) {
            $linkYml .= "  links:\n";
            foreach($linkServicesHash as $serviceName) {
                $linkYml .= "    - " . $config->projectName . '-' . $serviceName . "\n";
            }
        }

        return $linkYml;

    }
}