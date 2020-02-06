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
use App\Http\Middleware;

Route::get('/', 'ViewsController@mapviewer');



    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
   Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');






Route::get('/home', 'HomeController@index')->name('home');

Route::any('/search', 'HomeController@search')->name('search');
Route::get('/documentations', 'HomeController@documentations')->name('documentations');
// Route::get('/editproject');



Route::get('/addproject', 'MapPopupController@addURI')->name('showstore');
Route::post('/addproject/store', 'MapPopupController@store')->name('store');
Route::get('/edit/{project}', 'MapPopupController@edit')->name('edit');
Route::post('/update/{project}', 'MapPopupController@update');
Route::post('/delete/project', 'MapPopupController@destroy')->name('delete');
Route::delete('delete-multiple-category', ['as'=>'category.multiple-delete','uses'=>'MapPopupController@deleteMultiple']);




Route::get('/users', 'UsersController@viewusers');
Route::get('/adduser', 'UsersController@adduser');
Route::post('/adduser/store', 'UsersController@store');
Route::post('/delete/user', 'UsersController@destroy');

Route::get('/userprofile', 'HomeController@showUserProfile');

Route::get('/change/name','HomeController@showChangeNameForm');

Route::get('/change/email','HomeController@showChangeEmailForm');
Route::post('/changeEmail','HomeController@changeEmail');
Route::post('/changeName','HomeController@changeName');


Route::get('/change/password','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');




