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

/**
 * Roles
 */
$router->group(['prefix' => 'api/admin'], function () use ($router) {
    $router->post('roles', ['as' => 'roles.store', 'uses' => 'RoleController@store']);
    $router->get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index']);
    $router->get('roles/{role}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
    $router->delete('roles/{role}', ['as' => 'roles.destroy', 'uses' => 'RoleController@delete']);
    $router->put('roles/{role}', ['as' => 'roles.update', 'uses' => 'RoleController@update']);
});