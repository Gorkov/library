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
Route::get('/', function () {
    return view('welcome');
});

Route::resource('/books/','BookController');
Route::get('/book/{id}','BookController@show');

Route::resource('/authors/','AuthorController');
Route::get('/author/{id}','AuthorController@show');

Route::resource('/genres/','GenreController');
Route::get('/genre/{id}','GenreController@show');
