<?php

namespace ostark\LaravelControllerEvents\Tests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Controller;
use Orchestra\Testbench\TestCase as Orchestra;
use ostark\LaravelControllerEvents\ServiceProvider;

class OrchestraTestCase extends Orchestra
{
    public function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }

    protected function defineRoutes($router)
    {
        $router->get('/dogs', [DogsController::class, 'index']);
        $router->get('/dogs/{id}', [DogsController::class, 'edit']);
        $router->post('/dogs/{id}', [DogsController::class, 'update']);
    }
}

/**
 * Some dummies
 */
class DogsController extends Controller
{
    public $testProp = 1;

    public function index() {
        return 'index';
    }
    public function edit($id) {
        return "edit $id";
    }
    public function update($id, RandomObject $o) {
        return "update $id {$o->name}";
    }
}
class RandomObject
{
    public $name = 'random';
}

