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

$router->post('/auth/register', 'AuthController@register');
$router->post('/auth/login', 'AuthController@loginPost');

// $router->group(['middleware' => 'jwt.auth'], function () use ($router)
// {
// });
$router->get('/ticketing/getList', 'TicketingController@getListTicket');
$router->post('/ticketing/addTicket', 'TicketingController@addTicket');
$router->put('/ticketing/update/{id}', 'TicketingController@replyTicket');
$router->put('/ticketing/close/{id}', 'TicketingController@closeTicket');
$router->delete('/ticketing/delete/{id}', 'TicketingController@deleteTicket');