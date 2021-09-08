<?php

use Illuminate\Support\Facades\Event;
use ostark\LaravelControllerEvents\Events\AfterAction;
use ostark\LaravelControllerEvents\Events\BeforeAction;

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





test('can modify action parameters on the fly ', function () {

    Event::listen(function (BeforeAction $event) {
        $event->parameters->set('id', 123456);
    });

    $response = $this->get('/dogs/1');

    expect($response->content())->toBe('edit 123456');

});
