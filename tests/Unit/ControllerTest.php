<?php

use Illuminate\Routing\Contracts\ControllerDispatcher as ControllerDispatcherContract;

test('service provider binds custom controller', function () {
    $isBound = app()->bound(ControllerDispatcherContract::class);
    expect($isBound)->toBeTrue();
    $controller = resolve(\Illuminate\Routing\Contracts\ControllerDispatcher::class);
    expect($controller)->toBeInstanceOf(\ostark\LaravelControllerEvents\ControllerDispatcherWithEvents::class);
});
