<?php

namespace mindplay\benchmarks\required_types;

use Psr\Container\ContainerInterface;

interface FactoryDefinitionInterface
{
    public function createService(ContainerInterface $container): mixed;
}
