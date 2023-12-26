<?php

namespace mindplay\benchmarks\use_case;

class ServiceY
{
    public ?ServiceA $a;

    public function setServiceA(ServiceA $a)
    {
        $this->a = $a;
    }
}
