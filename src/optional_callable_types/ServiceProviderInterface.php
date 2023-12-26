<?php

namespace mindplay\benchmarks\optional_callable_types;

use Psr\Container\ContainerInterface;

interface ServiceProviderInterface
{
    /**
     * @return ((callable(ContainerInterface):mixed)|FactoryDefinitionInterface)[]
     */
    public function getFactories(): array;

    /**
     * @return ((callable(ContainerInterface,mixed):mixed)|ExtensionDefinitionInterface)[]
     */
    public function getExtensions(): array;
}
