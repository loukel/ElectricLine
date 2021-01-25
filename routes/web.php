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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'services'], function () {
  Route::group(['as' => 'services.'], function () {
    Route::get('/', 'ServiceController@index')->name('index');
    Route::get('/{slug}', 'ServiceController@show')->name('show');
  });

  Route::group(['as' => 'booking.'], function () {
    Route::post('/{slug}/book', 'BookingController@create')->name('create');
    Route::get('/{slug}/pay', 'BookingController@pay')->name('pay');
  });
});


