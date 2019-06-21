<?php

use Illuminate\Http\Request;

use App\Collection;
use App\Http\Resources\Collection as CollectionResource;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'AuthController@login');

Route::post('register', 'AuthController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('collections', 'CollectionController')->only([
    'index', 'store', 'show'
]);
