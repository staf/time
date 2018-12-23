<?php

/** @var \Illuminate\Routing\Router $router */

$router->view('/', 'welcome')->name('welcome');

// Authentication Routes...
$router->post('login', 'Auth\LoginController@login')->name('login');
$router->post('logout', 'Auth\LoginController@logout')->name('logout');
$router->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$router->post('register', 'Auth\RegisterController@register');
$router->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$router->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$router->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

$router->get('home', 'HomeController@index')->name('home');
