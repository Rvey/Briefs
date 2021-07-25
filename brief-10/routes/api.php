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
Route::post('comments', '\Laravelista\Comments\CommentController@store');
Route::delete('comments/{comment}', '\Laravelista\Comments\CommentController@destroy');
Route::put('comments/{comment}', '\Laravelista\Comments\CommentController@update');
Route::post('comments/{comment}', '\Laravelista\Comments\CommentController@reply');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
