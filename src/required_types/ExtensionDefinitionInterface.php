<?php

namespace mindplay\benchmarks\required_types;

use Psr\Container\ContainerInterface;

interface ExtensionDefinitionInterface
{
    public function extendService(ContainerInterface $container, mixed $previous): mixed;
}
