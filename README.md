# Controller Events for Laravel

Explain why this is a good idea.
...

## Installation

You can install the package via composer:

```bash
composer require ostark/laravel-controller-events
```


## Usage

Register a listener in the `EventServiceProvider`

```php
protected $listen = [
        \ostark\ControllerEvents\Events\BeforeAction::class => [
            YourBeforeListener::class,
        ],
        \ostark\ControllerEvents\Events\AfterAction::class => [
            YourAfterListener::class,
        ]
];
```

```php
use \ostark\ControllerEvents\Events\BeforeAction;

class YourBeforeListener 
{
    public function handle(BeforeAction $event) 
    {
        // $event->route
        // $event->controller
        // $event->method
        // $event->parameters
    }
}
```

```php
use \ostark\ControllerEvents\Events\AfterAction;

class YourAfterListener 
{
    public function handle(AfterAction $event) 
    {
        // $event->route
        // $event->controller
        // $event->method
        // $event->parameters
        // $event->response
    }
}
```

## Controller Events vs Middleware

* access to controller vs request/response only
* access to action name and parameters

## Controller Events vs Controller::__construct()

* knowledge about controller action
* knowledge about response
* run things after controller action


