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

Route::group(['prefix' => 'airports'], function () {

    Route::get('/', 'AirportController@index');
    
    Route::get('/create', 'AirportController@create')->name('air.create');
    Route::post('/create', 'AirportController@store')->name('air.store');

    Route::get('/{id}', 'AirportController@show')->name('air.show');

    Route::get('/{id}/edit', 'AirportController@edit')->name('air.edit');
    Route::put('/{id}/update', 'AirportController@update')->name('air.update');

    Route::delete('/{id}', 'AirportController@destroy')->name('air.destroy');

    Route::post('/{id}/assign/{company}', 'AirportController@assign')->name('assign');
    Route::post('/{id}/unassign/{company}', 'AirportController@unassign')->name('unassign');
});

Route::group(['prefix' => 'companies'], function () {

    Route::get('/', 'CompanyController@index');
    
    Route::get('/create', 'CompanyController@create')->name('com.create');
    Route::post('/create', 'CompanyController@store')->name('com.store');

    Route::get('/{id}', 'CompanyController@show')->name('com.show');

    Route::get('/{id}/edit', 'CompanyController@edit')->name('com.edit');
    Route::put('/{id}/update', 'CompanyController@update')->name('com.update');

    Route::delete('/{id}', 'CompanyController@destroy')->name('com.destroy');
});

Route::group(['prefix' => 'countries'], function () {

    Route::get('/', 'CountryController@index');
});

Route::any('/{any}', function () {
    return redirect('/airports');
})->where('any', '.*');