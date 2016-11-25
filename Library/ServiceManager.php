<?php
/**
 * User: cjimenez
 * Date: 21/11/16 10:59
 */



class ServiceManager {

    /**
     * @var \Pimple\Container
     */
    public $di;

    /**
     * List of services
     *
     * @var array of Services
     */
    private $serviceList = [];

    /**
     * @var string Name of the project
     */
    private $projectName;


    /**
     * Constructor
     *
     * @param string $projectName Name of the project
     */
    public function __construct($projectName, $di)
    {
        $this->projectName = $projectName;
        $this->di = $di;
    }

    /**
     * Adding a new service to the manager
     *
     * @param $serviceName
     */
    public function addService($serviceName)
    {
        $serviceWithNamespace = '\Service\\' . $serviceName;
        try {
            $service = new $serviceWithNamespace($this->di);
            $this->serviceList[$service->getName()] = $service;
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * Retrieving a string with the docker-compose.yml
     *
     * @return string YML string
     */
    public function getYml()
    {
        $globalYml = '';
        foreach($this->serviceList as $service) {
            $globalYml .= $service->getYml();
            $globalYml .= $service->getYmlLinks($this->serviceList);
        }

        return $globalYml;

    }
}