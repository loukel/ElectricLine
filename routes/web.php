<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
  // Display services available
  Route::get('/', 'ServiceController@index')->name('index'); // services.index

  Route::group(['prefix' => '/{slug}'], function ()  {
    Route::group(['prefix' => '/book', 'as' => 'book.' , 'middleware' => ['auth']], function () {
      /**
       * prefix: /services/{slug}/book/
       * name: services.book.
       * To book a service
       */
      // Mult-step form
      Route::get('/address', 'BookingController@address')->name('address');
      Route::get('/variant', 'BookingController@variant')->name('variant');
      Route::get('/datetime', 'BookingController@datetime')->name('datetime');
      Route::get('/pay', 'BookingController@pay')->name('pay');

      // Process the whole form inc. paying then redirect to the home page with a confirmation
      Route::post('/process', 'BookingController@process')->name('process');
    });
  });

});


