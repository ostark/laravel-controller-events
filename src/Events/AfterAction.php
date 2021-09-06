<?php


namespace ostark\LaravelControllerEvents\Events;


use Illuminate\Routing\Controller;
use Illuminate\Routing\Route;

class AfterAction
{
    public Route $route;
    public Controller $controller;
    public string $method;
    public array $parameters = [];
    public $result = null;

    public function __construct(
        Route $route,
        Controller $controller,
        string $method,
        array $parameters,
        $result = null
    ) {
        $this->route      = $route;
        $this->controller = $controller;
        $this->method     = $method;
        $this->parameters = $parameters;
        $this->result     = $result;
    }
}
