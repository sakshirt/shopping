<?php
//use Illuminate\Http\Request;
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

Route::prefix('admin')
    ->middleware(['web'])
    ->group(function() {

    /************************** Dashboard *************************/
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    /*************************** Register *************************/
    Route::get('/register', 'AdminController@register')->name('admin.register');

    Route::any('/register/store', 'AdminController@userStore');

    /**************************** Login ***************************/
    Route::get('/login', 'AdminController@login')->name('admin.login');
    Route::any('/login/authenticate', 'AdminController@authenticate')->name('admin.authenticate');
});