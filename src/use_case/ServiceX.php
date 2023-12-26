<?php

namespace mindplay\benchmarks\use_case;

class ServiceX
{
    public function __construct(
        public ServiceA $a,
        public ServiceB $b,
        public ServiceC $c
    ) {
    }
}
