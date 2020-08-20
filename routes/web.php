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
    return view('welcome');
});
Route::get('/todos','TodoController@index');
Route::get('/todos/create','TodoController@create');
Route::get('/todos/edit','TodoController@edit');


//elequent relation
Route::get('/numbers','StudentController@index')->name('numbers');
Route::get('/numbers','PhoneController@index')->name('numbers');
Route::get('/posts','PostController@index')->name('posts');
Route::get('/manypost','PostController@post');

//elequent crud/todo

Route::get('show/todo/','TodoController@show');
Route::get('insert/todo/','TodoController@create');
Route::get('edit/todo/{id}','TodoController@edit');
Route::post('submitted/todo/','TodoController@store');
Route::post('updated/todo/{id}','TodoController@update');
Route::get('delete/todo/{id}','TodoController@destroy');

//todos route
Route::get('/tasks','TaskController@index')->name('tasks');
Route::get('/tasks','TaskController@show');
Route::get('/tasks/status/{id}','TaskController@updatestatus');
Route::get('add/task/','TaskController@create');
Route::post('insert/task/','TaskController@store');
Route::post('update/task/{id}','TaskController@update');
Route::get('edit/task/{id}','TaskController@edit');
Route::get('delete/task/{id}','TaskController@destroy');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
