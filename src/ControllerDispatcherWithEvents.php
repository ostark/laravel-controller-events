<?php

namespace ostark\LaravelControllerEvents;

use Illuminate\Routing\ControllerDispatcher;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use ostark\LaravelControllerEvents\Events\AfterAction;
use ostark\LaravelControllerEvents\Events\BeforeAction;

class ControllerDispatcherWithEvents extends ControllerDispatcher
{
    /**
     * Dispatch a request to a given controller and method.
     *
     * @param \Illuminate\Routing\Route $route
     * @param mixed                     $controller
     * @param string                    $method
     *
     * @return mixed
     */
    public function dispatch(Route $route, $controller, $method)
    {
        if (!($controller instanceof \Illuminate\Routing\Controller)) {
            throw new \InvalidArgumentException('Invalid type. $controller is of type: ' . gettype($controller));
        }

        $parameters = new ActionParameters($this->resolveClassMethodDependencies(
            $route->parametersWithoutNulls(), $controller, $method
        ));

        event(new BeforeAction(
            $route,
            $controller,
            $parameters
        ));

        // Run the controller action
        $response = $controller->{$method}(...$parameters->values());

        event(new AfterAction(
            $route,
            $controller,
            $parameters,
            $response
        ));

        return $response;
    }

}
