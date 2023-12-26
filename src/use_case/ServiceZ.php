<?php

namespace mindplay\benchmarks\use_case;

class ServiceZ
{
    public function __construct(public ServiceX $x, public ServiceY $y)
    {
    }
}
