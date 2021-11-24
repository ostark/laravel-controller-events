<?php

use Illuminate\Support\Facades\Event;
use ostark\LaravelControllerEvents\Events\AfterAction;
use ostark\LaravelControllerEvents\Events\BeforeAction;
use ostark\LaravelControllerEvents\Tests\RandomObject;

test('requests hit controller', function () {
    $index = $this->get('/dogs');
    $edit = $this->get('/dogs/1');
    $update = $this->post('/dogs/1', ['wuff' => 1]);

    expect($index->content())->toBe('index');
    expect($edit->content())->toContain('edit');
    expect($update->content())->toContain('update');
});

test('events are dispatched', function () {
    Event::fake();
    $this->get('/dogs');

    Event::assertDispatched(BeforeAction::class);
    Event::assertDispatched(AfterAction::class);
});

test('can access and modify controller in BeforeAction event', function () {

    Event::listen(function (BeforeAction $event) {
        $event->controller->testProp = 99;
    });

    Event::listen(function (AfterAction $event) {
        $GLOBALS['TEST_PROP'] = $event->controller->testProp;
    });

    $this->get('/dogs/1');
    expect($GLOBALS['TEST_PROP'])->toBe(99);
});

test('can overwrite action parameters in BeforeAction event', function () {

    Event::listen(function (BeforeAction $event) {
        $event->parameters->set('id', 5000);
    });

    $response = $this->get('/dogs/1');
    expect($response->content())->toBe('edit 5000');
});

test('can modify action parameters in BeforeAction event', function () {

    Event::listen(function (BeforeAction $event) {
        $event->parameters->modifyValue('id', function ($value) {
            return $value + 1000;
        });
    });

    $response = $this->get('/dogs/1');
    expect($response->content())->toBe('edit 1001');
});


test('can modify unnamed action parameter in BeforeAction event', function () {

    Event::listen(function (BeforeAction $event) {
        $event->parameters->modifyValue(RandomObject::class, function ($random) {
            $random->name = 'modified';
            return $random;
        });
    });

    $response = $this->post('/dogs/5');
    expect($response->content())->toBe('update 5 modified');
});
