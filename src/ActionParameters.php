<?php

namespace ostark\LaravelControllerEvents;

use Symfony\Component\HttpFoundation\ParameterBag;

class ActionParameters extends ParameterBag
{
    public function values(): array
    {
        return array_values($this->all());
    }

    /**
     * Modifies a parameter value using a callback
     */
    public function modifyValue(string $name, callable $callback): void
    {
       foreach ($this->all() as $key => $value) {
            if ($value instanceof $name || $key === $name) {
                $modified = $callback($value);
                $this->set($key, $modified);
            }
        }
    }
}
