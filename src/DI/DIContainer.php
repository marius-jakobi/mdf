<?php


namespace MDF\DI;

use \DI\ContainerBuilder;
use \DI\Container;


class DIContainer
{
    /**
     * @var ContainerBuilder
     */
    private ContainerBuilder $builder;
    /**
     * @var Container
     */
    private Container $container;

    /**
     * DIContainer constructor.
     * @throws \Exception
     */
    public function __construct() {
        $this->builder = new ContainerBuilder();
        $this->builder->addDefinitions(__DIR__ . '../di-config.php');

        $this->container = $this->builder->build();
    }

    /**
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }


}