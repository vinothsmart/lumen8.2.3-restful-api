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
// $router->group(['prefix' => 'api/admin'], function () use ($router) {
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('roles', ['as' => 'roles.store', 'uses' => 'Role\RoleController@store']);
    $router->get('roles', ['as' => 'roles.index', 'uses' => 'Role\RoleController@index']);
    $router->get('rolesList', ['as' => 'roles.list', 'uses' => 'Role\RoleController@list']);
    $router->get('roles/{role}', ['as' => 'roles.show', 'uses' => 'Role\RoleController@show']);
    $router->delete('roles/{role}', ['as' => 'roles.destroy', 'uses' => 'Role\RoleController@delete']);
    $router->put('roles/{role}', ['as' => 'roles.update', 'uses' => 'Role\RoleController@update']);
});
