<?php

namespace mindplay\benchmarks\optional_callable_types;

use Psr\Container\ContainerInterface;

interface FactoryDefinitionInterface
{
    public function __invoke(ContainerInterface $container): mixed;
}
