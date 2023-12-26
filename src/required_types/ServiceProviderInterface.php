<?php

namespace mindplay\benchmarks\required_types;

use Psr\Container\ContainerInterface;

interface ServiceProviderInterface
{
    /**
     * @return FactoryDefinitionInterface[]
     */
    public function getFactories(): array;

    /**
     * @return ExtensionDefinitionInterface[]
     */
    public function getExtensions(): array;
}
