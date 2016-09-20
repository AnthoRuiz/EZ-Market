<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/** Rutas para la aplicacion de Ez-Market **/

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
//'middleware => VerifyAccessKey'
    $api->group(['namespace' => 'market\Http\Controllers\Api'], function($api){

        /** Category */
        $api->get('categories', 'CategoryController@index');
        $api->post('category', 'CategoryController@store');

        /** Product */
        $api->get('products', 'ProductController@index');
        $api->post('product', 'ProductController@store');
        $api->get('productsOrderByCategory', 'ProductController@orderByCategory');
    });

});