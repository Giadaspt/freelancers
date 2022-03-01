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
    return view('guest.welcome');
})->name('home');

Auth::routes();

// Route::get('/home', 'Admin\HomeController@index')->name('home');


Route::middleware('auth')
->namespace('Admin')
->prefix('admin')
->name('admin.')
->group( function(){

        Route::get('/', 'HomeController@index')->name('index');

        Route::resource('/users', 'UserController');

        Route::get('/messages', 'PageController@messages')->name('message');
        
        Route::get('/reviews', 'ReviewController@reviews')->name('reviews');

        Route::resource('/sponsorships', 'SponsorController');

        Route::get('/payment', 'PaymentController@pay');

    });
