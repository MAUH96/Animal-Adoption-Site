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

// THIS IS LARAVEL TEMPLATING SYSTEM PAGE: ALLOW YOU TO CREATE PAGES ---> ROUTES

Route::get('/', function () {
    return view('welcome');
});

// VIES IS THE HTML PAGE WELCOME --WELCOME.BLADE.PHP

Auth::routes();
Route::get('animals/pending/{id}/reject', 'RequestsDbsController@reject');
Route::get('animals/pending/{id}/approve/{animal_id}', 'RequestsDbsController@approve');
Route::get('animals/pending/delete/{id}', 'RequestsDbsController@delete');
Route::get('animals/request', 'RequestsDbsController@show');
Route::get('animals/pending', 'RequestsDbsController@pending');
Route::get('animals/request/{id}', 'RequestsDbsController@request');

/**
 *  route pages for class AnimalController --> controller class
 */
Route::get('animals/{id}/deleteimage/{image_id}', 'AnimalsDbsController@deleteimage');
Route::resource('animals','AnimalsDbsController');

/**
 * route for HomeController ---> controller class
 */
Route::get('/firstHome', 'HomeController@index')->name('firstHome');


