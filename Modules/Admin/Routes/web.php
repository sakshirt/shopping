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

Route::prefix('user')->group(function() {

    //---------------------------------------------
    //    Route::get('/', 'AdminController@register');
    //----------------------------------------------

    //    Route::get('/', 'AdminController@index');

    Route::get('/register', 'AdminController@userRegister');
    Route::get('/register/store', 'User@userStore');

});
