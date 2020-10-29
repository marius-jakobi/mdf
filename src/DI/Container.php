<?php


namespace MDF\DI;

use \DI\ContainerBuilder;
use \DI\Container as DIContainer;


class Container
{
    /**
     * @var ContainerBuilder
     */
    private ContainerBuilder $builder;
    /**
     * @var DIContainer
     */
    private DIContainer $container;

    /**
     * Container constructor.
     * @throws \Exception
     */
    public function __construct() {
        $this->builder = new ContainerBuilder();

        $this->container = $this->builder->build();
    }

    /**
     * @return DIContainer
     */
    public function getContainer(): DIContainer
    {
        return $this->container;
    }
}