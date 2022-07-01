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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/todo', 'ItemController@getItems')->name('todo');
Route::get('/create-todo', 'ItemController@createItem')->name('create.item');
Route::post('/todo', 'ItemController@addItem')->name('todo');
Route::get('/edit-todo/{item}', 'ItemController@editItem')->name('todo.edit');
Route::put('/todo/{item}', 'ItemController@updateItem')->name('todo.update');
Route::get('/todo/delete/{item}', 'ItemController@destroy')->name('todo.delete');
