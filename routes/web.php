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

Route::get('/cars', 'CarController@index')->name('car.index');
Route::get('/cars/create', 'CarController@create')->name('car.create');
Route::post('/cars', 'CarController@store')->name('car.store');
Route::get('/cars/{car}', 'CarController@show')->name('car.show');
//Route::get('/cars/{car}/edit', 'CarsController@edit')->name('car.edit');
Route::put('/cars/{car}', 'CarController@update')->name('car.update');
Route::delete('/cars/{car}', 'CarController@destroy')->name('car.destroy');
Route::post('/cars/search', 'CarController@search')->name('cars.search');



Route::get('/locations', 'LocationController@index')->name('location.index');
Route::get('/locations/create', 'LocationController@create')->name('location.create');
Route::post('/locations', 'LocationController@store')->name('location.store');
Route::get('/locations/{location}', 'LocationController@show')->name('location.show');
//Route::get('/locations/{location}/edit', 'LocationController@edit')->name('location.edit');
Route::put('/locations/{location}', 'LocationController@update')->name('location.update');
Route::delete('/locations/{location}', 'LocationController@destroy')->name('location.destroy');


Route::get('rent/step-1/{car_id}', 'RentController@step1')->name('rent.step1');
Route::post('rent/step-2/', 'RentController@step2')->name('rent.step2');
Route::post('rent/finish/', 'RentController@store')->name('rent.store');

Route::get('rent/cancel/{car_id}', 'RentController@cancelRent')->name('rent.cancel');

