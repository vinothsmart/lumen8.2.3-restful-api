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

$router->get('/phpinfo', function () use ($router) {
    phpinfo();
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
    $router->put('roles/{role}', ['as' => 'roles.update', 'uses' => 'Role\RoleController@update']);
    $router->delete('roles/{role}', ['as' => 'roles.destroy', 'uses' => 'Role\RoleController@delete']);
    $router->get('roles/{role}/users', ['as' => 'roles.users', 'uses' => 'Role\RoleUserController@index']);
});


/**
 * Users
 */
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('users', ['as' => 'users.store', 'uses' => 'User\UserController@store']);
    $router->get('users', ['as' => 'users.index', 'uses' => 'User\UserController@index']);
    $router->get('users/{user}', ['as' => 'users.show', 'uses' => 'User\UserController@show']);
    $router->put('users/{user}', ['as' => 'users.update', 'uses' => 'User\UserController@update']);
    $router->delete('users/{user}', ['as' => 'users.destroy', 'uses' => 'User\UserController@delete']);
});
