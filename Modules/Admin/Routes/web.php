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

Route::prefix('admin')->middleware(['web'])->group(function()
{
    /**************************** Dashboard ***************************/
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
});

Route::prefix('admin')->middleware(['web'])->group(function()
{
    /*************************** Register *************************/
    Route::get('/register', 'AdminController@register')->name('admin.register');
    Route::any('/register/store', 'AdminController@userStore')->name('admin.store');

    /**************************** Login ***************************/
    Route::get('/login', 'AdminController@login')->name('admin.login');
    Route::any('/login/auth', 'AdminController@authenticate')->name('admin.authenticate');
});

