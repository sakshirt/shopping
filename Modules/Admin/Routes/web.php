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

/**************************************************************
                       Admin Dashboard
**************************************************************/
Route::prefix('admin')
->middleware(['web', 'admin'])
->group(function()
{
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
});

/**************************************************************
                       Admin Login/Register
**************************************************************/
Route::prefix('admin')
->middleware(['web'])
->group(function()
{
    Route::get('/register', 'AdminController@register')->name('admin.register');
    Route::any('/register/store', 'AdminController@userStore')->name('admin.store');

    Route::get('/login', 'AdminController@login')->name('admin.login');
    Route::any('/login/auth', 'AdminController@authenticate')->name('admin.authenticate');


    Route::get('/forgot/password', 'AdminController@forgotPassword')->name('admin.forgot.password');
    Route::post('/forgot/password/email', 'AdminController@sendForgotPasswordEmail')->name('admin.forgot.password.email');
    Route::post('/forgot/password/reset/{token}', 'AdminController@resetPasswordForm')
                ->name('admin.reset.password');
    // Route::get('/forgot/password/reset/{token}', 'AdminController@resetPassword')->name('');
});

