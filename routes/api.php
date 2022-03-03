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

Route::group(['prefix' => 'artist'], function () {

    Route::post('create', 'App\Http\Controllers\Api\ArtistController@create')->name('api.artist.create');
    Route::get('get/{id}', 'App\Http\Controllers\Api\ArtistController@get')->name('api.artist.get');
});

Route::group(['prefix' => 'album'], function () {

    Route::post('create', 'App\Http\Controllers\Api\AlbumController@create')->name('api.album.create');
    Route::get('get/{id}', 'App\Http\Controllers\Api\AlbumController@get')->name('api.album.get');
});

Route::group(['prefix' => 'song'], function () {

    Route::post('create', 'App\Http\Controllers\Api\SongController@create')->name('api.song.create');
    Route::delete('delete/{id}', 'App\Http\Controllers\Api\SongController@delete')->name('api.song.delete');
    Route::get('get/{id}', 'App\Http\Controllers\Api\SongController@get')->name('api.song.get');

});


