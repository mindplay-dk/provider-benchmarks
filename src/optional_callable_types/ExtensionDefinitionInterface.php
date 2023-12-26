<?php

namespace mindplay\benchmarks\optional_callable_types;

use Psr\Container\ContainerInterface;

interface ExtensionDefinitionInterface
{
    public function __invoke(ContainerInterface $container, mixed $previous): mixed;
}
