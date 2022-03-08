<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\User;

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

// Route::get('/', function () {
//     return view('guest.welcome');
// })->name('home');


// Route::get('/home', 'Admin\HomeController@index')->name('home');

Auth::routes();

Route::middleware('auth')
->namespace('Admin')
->prefix('admin')
->name('admin.')
->group( function(){

        Route::get('/', 'HomeController@index')->name('index');

        Route::resource('/users', 'UserHomeController');

        Route::get('/messages', 'PageController@messages')->name('message');
        
        Route::get('/reviews', 'ReviewController@reviews')->name('reviews');

        Route::resource('/sponsorships', 'SponsorController');

        Route::get('/users/{id}/editSponsorships', 'UserHomeController@editSponsorships')->name('editSponsorships');

        Route::put('/users/{user}', 'UserHomeController@updateSponsorship')->name('updateSponsorship');

        Route::get('/payment', 'PaymentController@pay');

        Route::delete('/users/messages/{id}', 'PageController@deleteMessage')->name('deleteMessage');

        Route::delete('/users/reviews/{id}', 'ReviewController@deleterReview')->name('deleteReviews');


    });


    Route::get('{any?}', function(){
        return view('guest.welcome');
    })->where('any', '.*')->name('welcome');