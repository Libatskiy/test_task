<?php

use Illuminate\Http\Request;

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

Route::prefix('/bars')->group(function () {
    Route::get('/', 'HookahBarController@get');
    Route::post('/', 'HookahBarController@create');
    Route::delete('/{id}', 'HookahBarController@destroy')->where('id', '[0-9]+');
});

Route::prefix('/hookahs')->group(function () {
    Route::get('/', 'HookahController@get');
    Route::post('/', 'HookahController@create');
    Route::delete('/{id}', 'HookahController@destroy')->where(['id'], '[0-9]+');
    Route::get('/find/bar={bar}/from={timeFrom}/to={timeTo}/people={people}', 'HookahController@find')
        ->where(['bar', 'timeFrom', 'timeTo', 'people'], '[0-9]+');
});

Route::prefix('/hookah-in-bar')->group(function () {
    Route::post('/', 'HookahRelationController@create');
    Route::delete('/{hookah_id}', 'HookahRelationController@destroy')->where('hookah_id', '[0-9]+');
});

Route::prefix('/booking')->group(function (){
    Route::post('/', 'ReservationController@create');
    Route::get('/active', 'ReservationController@index');
    Route::get('/active/{id}', 'ReservationController@getForBar')->where('id', '[0-9]+');

});
