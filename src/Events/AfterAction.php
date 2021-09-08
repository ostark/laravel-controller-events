<?php


namespace ostark\LaravelControllerEvents\Events;


use Illuminate\Routing\Controller;
use Illuminate\Routing\Route;
use ostark\LaravelControllerEvents\ActionParameters;

class AfterAction
{
    public Route $route;
    public Controller $controller;
    public ActionParameters $parameters;
    /**
     * @var \Symfony\Component\HttpFoundation\Response|mixed|null
     */
    public $response = null;

    /**
     * AfterAction constructor.
     *
     * @param \Illuminate\Routing\Route      $route
     * @param \Illuminate\Routing\Controller $controller
     * @param ActionParameters $parameters
     * @param \Symfony\Component\HttpFoundation\Response|mixed|null $response
     */
    public function __construct(
        Route $route,
        Controller $controller,
        ActionParameters $parameters,
        $response = null
    ) {
        $this->route      = $route;
        $this->controller = $controller;
        $this->parameters = $parameters;
        $this->response     = $response;
    }
}
