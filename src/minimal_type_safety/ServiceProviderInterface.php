<?php

namespace mindplay\benchmarks\minimal_type_safety;

interface ServiceProviderInterface
{
    /**
     * @return (callable(ContainerInterface):mixed)[]
     */
    public function getFactories(): array;

    /**
     * @return (callable(ContainerInterface,mixed):mixed)[]
     */
    public function getExtensions(): array;
}
