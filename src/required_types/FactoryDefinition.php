<?php

namespace mindplay\benchmarks\required_types;

use Psr\Container\ContainerInterface;

class FactoryDefinition implements FactoryDefinitionInterface
{
    public function __construct(private $factory)
    {}

    public function createService(ContainerInterface $container): mixed
    {
        return ($this->factory)($container);
    }
}
