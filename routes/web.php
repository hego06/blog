<?php

use Illuminate\Support\Facades\Auth;

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
//Route::model('post', 'Post');

Route::get('/','FrontController@index');
Route::get('/blog/{id}','FrontController@show')->name('blog.show');

Route::group(['middleware' => 'auth'],function(){
    Route::resource('post','PostController');
    Route::resource('user','UserController');
    //Route::resource('user_role','UserRoleController');

    Route::put('user_role/{user}/user','UserRoleController@update')->name('user_role.update');
    Route::put('user_permission/{user}/user','UserPermissionController@update')->name('user_permission.update');
    Route::get('admin','AdminController@index')->name('admin');
    Route::post('post/{post}/photo','PhotoController@store')->name('photo.store');
    Route::delete('photo/{photo}', 'PhotoController@destroy')->name('photo.destroy');
});




// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');