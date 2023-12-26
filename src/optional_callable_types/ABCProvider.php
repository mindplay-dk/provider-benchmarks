<?php

namespace mindplay\benchmarks\optional_callable_types;

use mindplay\benchmarks\use_case\ServiceA;
use mindplay\benchmarks\use_case\ServiceB;
use mindplay\benchmarks\use_case\ServiceC;

class ABCProvider implements ServiceProviderInterface
{
    public function getFactories(): array
    {
        return [
            ServiceA::class => fn () => new ServiceA(),
            ServiceB::class => fn () => new ServiceB(),
            ServiceC::class => fn () => new ServiceC(),
        ];
    }

    public function getExtensions(): array
    {
        return [];
    }
}
