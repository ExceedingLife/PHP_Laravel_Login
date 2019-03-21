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

// route to show the login form
//Route::get('login', array('uses'=>'HomeController@showLogin'));
// route to process the form auth.passwords.reset
//Route::post('login', array('uses'=>'HomeController@doLogin'));

// no email verification
Auth::routes();

// adding email verification
Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/changePassword', 'HomeController@showChangePasswordForm');
Route::post('/changePassword', 'HomeController@changePassword')->name('changePassword');

Route::resource('users', 'UserController');
// Route::get('/passwordChange', 'HomeController@showSetPasswordView');
// Route::get('/passwordChange', function(){
//     return view('auth.passwords.reset');
// });