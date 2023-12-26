<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use mindplay\benchpress\Benchmark;

use mindplay\benchmarks\minimal_type_safety;
use mindplay\benchmarks\optional_callable_types;
use mindplay\benchmarks\use_case\ServiceA;
use mindplay\benchmarks\use_case\ServiceB;
use mindplay\benchmarks\use_case\ServiceC;
use mindplay\benchmarks\use_case\ServiceX;
use mindplay\benchmarks\use_case\ServiceY;
use mindplay\benchmarks\use_case\ServiceZ;
use Psr\Container\ContainerInterface;

$bench = new Benchmark();

function get_services(ContainerInterface $container) {
    $a = $container->get(ServiceA::class);
    $b = $container->get(ServiceB::class);
    $c = $container->get(ServiceC::class);

    $x = $container->get(ServiceX::class);
    $y = $container->get(ServiceY::class);
    $z = $container->get(ServiceZ::class);
}

$bench->add(
    'minimal_type_safety',
    function () {
        $container = new minimal_type_safety\Container();

        $container->register(new minimal_type_safety\ABCProvider());
        $container->register(new minimal_type_safety\XYZProvider());

        get_services($container);
    }
);

$bench->add(
    'minimal_type_safety',
    function () {
        $container = new optional_callable_types\Container();

        $container->register(new optional_callable_types\ABCProvider());
        $container->register(new optional_callable_types\XYZProvider());

        get_services($container);
    }
);

$bench->run();
