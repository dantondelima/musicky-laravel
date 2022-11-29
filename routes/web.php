<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('artista', 'ArtistaController')->parameters(['artista' => 'artista']);
Route::resource('album', 'AlbumController')->parameters(['album' => 'album']);
Route::resource('musica', 'MusicaController')->parameters(['musica' => 'musica']);

Route::prefix('api')->namespace('API')->as("api.")->group(function () {
    Route::resource('artista', 'ArtistaController')->parameters(['artista' => 'artista']);
    Route::resource('album', 'AlbumController')->parameters(['album' => 'album']);
    Route::resource('musica', 'MusicaController')->parameters(['musica' => 'musica']);
});