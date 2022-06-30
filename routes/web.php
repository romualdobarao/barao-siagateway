<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


#Grouped together
$router->group(['middleware'=>'client.credentials'], function() use ($router){

#User1
$router->get('/users1','User1Controller@index');
$router->post('/users1','User1Controller@add');
$router->get('/users1/{userId}','User1Controller@show');
$router->put('/users1/{userId}','User1Controller@update');
$router->delete('/users1/{userId}','User1Controller@delete');

#User2
$router->get('/users2','User2Controller@index');
$router->post('/users2','User2Controller@add');
$router->get('/users2/{userId}','User2Controller@show');
$router->put('/users2/{userId}','User2Controller@update');
$router->delete('/users2/{userId}','User2Controller@delete');
});

$router->group(['middleware'=> 'auth:api'], function () use ($router){
    $router->get('/users/me', 'UserController@me');
}); 