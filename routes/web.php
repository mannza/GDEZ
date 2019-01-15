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

Route::get('/', 'PagesController@homepage')->name('homepage');
Route::get('hubungi', 'PagesController@hubungi')->name('c');

# Protect route (Perlukan authentication )
Route::group(['middleware'=> 'auth'], function () {
  
  # Tetapkan route yang perlukan role admin
  Route::group(['middleware' => 'is_admin'], function () {
  
    # Route untuk paparkan senarai users
    Route::get('users', 'UsersController@index')->name('users.index');
    # Route untuk papar borang tambah users
    Route::get('users/add', 'UsersController@create')->name('users.create');
    # Route untuk papar borang edit user
    Route::post('users', 'UsersController@store')->name('users.store');
    # Route untuk simpan rekod dari borang tambah user
    Route::get('users/{id}/edit', 'UsersController@edit')->name('users.edit');
    # Route untuk kemaskini rekod user
    Route::patch('users/{id}/edit', 'UsersController@update')->name('users.update');
    # Route untuk delete user
    Route::delete('users/{id}', 'UsersController@destroy')->name('users.destroy');


    # Route untuk paparkan senarai trader_get_unstable_period
    Route::get('lab', 'LabController@index')->name('lab.index');
    # Route untuk papar borang tambah users
    Route::get('lab/add', 'LabController@create')->name('lab.create');
    # Route untuk papar borang edit user
    Route::post('lab', 'LabController@store')->name('lab.store');
    # Route untuk simpan rekod dari borang tambah user
    Route::get('lab/{id}/edit', 'LabController@edit')->name('lab.edit');
    # Route untuk kemaskini rekod user
    Route::patch('lab/{id}/edit', 'LabController@update')->name('lab.update');
    # Route untuk delete user
    Route::delete('lab/{id}', 'LabController@destroy')->name('lab.destroy');
    
  });
  
  

  Route::resource('tempahan', 'TempahanController');

  # Route untuk paparkan senarai makmal pada frontend
  Route::get('lab/show', 'LabController@show')->name('lab.show');
  # Route untuk paparkan senarai tempahan pada frontend
  Route::get('tempahan/show', 'TempahanController@show')->name('tempahan.show');
  # Route untuk paparkan senarai pengguna pada frontend
  Route::get('users/show', 'UsersController@show')->name('users.show');

  Route::get('/home', 'HomeController@index')->name('home');
  
});

Auth::routes();
