<?php

namespace mindplay\benchmarks\required_types;

use mindplay\benchmarks\use_case\ServiceA;
use mindplay\benchmarks\use_case\ServiceB;
use mindplay\benchmarks\use_case\ServiceC;

class ABCProvider implements ServiceProviderInterface
{
    public function getFactories(): array
    {
        return [
            ServiceA::class => new FactoryDefinition(fn () => new ServiceA()),
            ServiceB::class => new FactoryDefinition(fn () => new ServiceB()),
            ServiceC::class => new FactoryDefinition(fn () => new ServiceC()),
        ];
    }

    public function getExtensions(): array
    {
        return [];
    }
}
