<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/user','UserController@getAllUser');
$router->get('/user','UserController@getUser');
$router->post('/user','UserController@addUser');
$router->get('/cd','CDController@getAllCD');
$router->get('/cd/{title}','CDController@getCD');
$router->post('/cd','CDController@addCD');
$router->put('/cd/{title}','CDController@updateCD');
