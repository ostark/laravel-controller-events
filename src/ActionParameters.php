<?php

namespace ostark\LaravelControllerEvents;

use Symfony\Component\HttpFoundation\ParameterBag;

class ActionParameters extends ParameterBag
{
    public function values(): array
    {
        return array_values($this->all());
    }
}
