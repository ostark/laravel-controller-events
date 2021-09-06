<?php

namespace ostark\LaravelControllerEvents\Events;

use Illuminate\Routing\Controller;
use Illuminate\Routing\Route;

class BeforeAction
{
    public Route $route;
    public Controller $controller;
    public string $method;
    public array $parameters = [];

    public function __construct(
        Route $route,
        Controller $controller,
        string $method,
        array $parameters
    ) {
        $this->route = $route;
        $this->controller = $controller;
        $this->method = $method;
        $this->parameters = $parameters;
    }
}
