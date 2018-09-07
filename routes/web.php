<?php

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

Route::get('/', 'Index@action');
Route::get('/albums', 'Albums@action');
Route::get('/adminPanel', 'AdminPanel\Index@action');

Route::get('/adminPanel/editSong/{song}', 'AdminPanel\EditSong@action');
Route::get('/adminPanel/editSong', 'AdminPanel\EditSong@action');//new song
Route::post('/adminPanel/saveSong', 'AdminPanel\SaveSong@action');
Route::get('/adminPanel/deleteSong/{song}', 'AdminPanel\deleteSong@action');

Route::get('/adminPanel/editAlbum/{album}', 'AdminPanel\EditAlbum@action');
Route::get('/adminPanel/editAlbum', 'AdminPanel\EditAlbum@action');//new album
Route::post('/adminPanel/saveAlbum', 'AdminPanel\SaveAlbum@action');
Route::get('/adminPanel/deleteAlbum/{album}', 'AdminPanel\deleteAlbum@action');

Auth::routes();
