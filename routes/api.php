<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getImages', 'App\Http\Controllers\ImageController@getImages');
Route::get('getImage/{id}', 'App\Http\Controllers\ImageController@getImage');
Route::get('sendAdminMail', 'App\Http\Controllers\MailController@sendAdminEmail');
