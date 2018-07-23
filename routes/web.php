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

/*
 * Public routes
 */
Route::get('/', function () {
    return view('welcome');
})->name('welcom');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/register', function() {
    return view('register');
})->name('register');

/*
 * Private routes
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Profile routes
Route::get('/profile', 'UserProfileController@index')->name('profile')->middleware('auth');

Route::get('/profile/edit', 'UserProfileController@update')->name('profile-edit')->middleware('auth');
Route::post('/profile/save', 'UserProfileController@save')->name('profile-save')->middleware('auth');

// Email route
Route::get('email', 'EmailController@sendEmail')->middleware('auth');
