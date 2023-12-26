<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use function mindplay\testies\{test, ok, eq, run};

use mindplay\benchmarks\use_case\ServiceA;
use mindplay\benchmarks\use_case\ServiceB;
use mindplay\benchmarks\use_case\ServiceC;
use mindplay\benchmarks\use_case\ServiceX;
use mindplay\benchmarks\use_case\ServiceY;
use mindplay\benchmarks\use_case\ServiceZ;
use Psr\Container\ContainerInterface;

use mindplay\benchmarks\minimal_type_safety;
use mindplay\benchmarks\optional_callable_types;

function check_container_types(ContainerInterface $c) {
    ok($c->has(ServiceA::class));
    ok($c->has(ServiceB::class));
    ok($c->has(ServiceC::class));
    ok($c->has(ServiceX::class));
    ok($c->has(ServiceY::class));
    ok($c->has(ServiceZ::class));

    $z = $c->get(ServiceZ::class);
    $y = $c->get(ServiceY::class);
    $x = $c->get(ServiceX::class);

    eq($x->a, $c->get(ServiceA::class));
    eq($x->b, $c->get(ServiceB::class));
    eq($x->c, $c->get(ServiceC::class));

    eq($y->a, $c->get(ServiceA::class));

    eq($z->x, $x);
    eq($z->y, $y);
}

test(
    "minimal_type_safety",
    function () {
        $c = new minimal_type_safety\Container();

        $c->register(new minimal_type_safety\XYZProvider());
        $c->register(new minimal_type_safety\ABCProvider());

        check_container_types($c);
    }
);

test(
    "optional_callable_types",
    function () {
        $c = new optional_callable_types\Container();

        $c->register(new optional_callable_types\XYZProvider());
        $c->register(new optional_callable_types\ABCProvider());

        check_container_types($c);
    }
);

exit(run());
