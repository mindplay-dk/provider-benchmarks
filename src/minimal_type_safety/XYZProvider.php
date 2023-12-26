<?php

namespace mindplay\benchmarks\minimal_type_safety;

use mindplay\benchmarks\use_case\ServiceA;
use mindplay\benchmarks\use_case\ServiceB;
use mindplay\benchmarks\use_case\ServiceC;
use mindplay\benchmarks\use_case\ServiceX;
use mindplay\benchmarks\use_case\ServiceY;
use mindplay\benchmarks\use_case\ServiceZ;
use Psr\Container\ContainerInterface;

class XYZProvider implements ServiceProviderInterface
{
    public function getFactories(): array
    {
        return [
            ServiceX::class => fn (ContainerInterface $c) => new ServiceX($c->get(ServiceA::class), $c->get(ServiceB::class), $c->get(ServiceC::class)),
            ServiceY::class => fn () => new ServiceY(),
            ServiceZ::class => fn (ContainerInterface $c) => new ServiceZ($c->get(ServiceX::class), $c->get(ServiceY::class)),
        ];
    }

    public function getExtensions(): array
    {
        return [
            ServiceY::class => function (ContainerInterface $c, ServiceY $y) {
                $a = $c->get(ServiceA::class);

                $y->setServiceA($a);

                return $y;
            }
        ];
    }
}
