# Controller Events for Laravel



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

class YourBeforeListener 
{
    public function handle(AfterAction $event) 
    {
        // $event->route
        // $event->controller
        // $event->method
        // $event->parameters
        // $event->result
    }
}
```


## Controller Events vs Middleware

Why? How? What?

## Controller Events vs Controller::__construct()

Why? How? What?

