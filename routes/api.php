<?php

/** @var \Illuminate\Routing\Router $router */

$router->group(['middleware' => ['auth']], function (\Illuminate\Routing\Router $router) {

    $router->post('timer', 'TimerController@store')->name('timer.store');
    $router->patch('timer/stop/{timer}', 'TimerController@stop')->name('timer.stop');

});
