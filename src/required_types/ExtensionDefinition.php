<?php

namespace mindplay\benchmarks\required_types;

use Psr\Container\ContainerInterface;

class ExtensionDefinition implements ExtensionDefinitionInterface
{
    public function __construct(private $extension)
    {}

    public function extendService(ContainerInterface $container, mixed $previous): mixed
    {
        return ($this->extension)($container, $previous);
    }
}
