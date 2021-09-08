<?php

namespace ostark\LaravelControllerEvents\Events;

use Illuminate\Routing\Controller;
use Illuminate\Routing\Route;
use ostark\LaravelControllerEvents\ActionParameters;

class BeforeAction
{
    public Route $route;
    public Controller $controller;
    public ActionParameters $parameters;

    public function __construct(
        Route $route,
        Controller $controller,
        ActionParameters $parameters
    ) {
        $this->route      = $route;
        $this->controller = $controller;
        $this->parameters = $parameters;
    }
}
