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
Route::get('/create', 'CourseController@add')->name('add');
Route::post('/create', 'CourseController@store')->name('store');
Route::get('/course', 'CourseController@index')->name('course');
Route::get('/course/{id?}', 'CourseController@show')->name('show');
Route::get('/course/{id?}/edit', 'CourseController@edit')->name('edit');
Route::post('/course/{id?}/edit', 'CourseController@update')->name('update');
Route::get('/course/{id?}/delete', 'CourseController@destroy');

