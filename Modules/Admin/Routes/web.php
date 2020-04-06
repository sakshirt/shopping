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
    Route::post('/productSave', 'DashboardController@saveProduct')->name('admin.product.save');
    Route::any('/list', 'DashboardController@getProductList')->name('admin.product.list');
    Route::any('/upload', 'DashboardController@uploadFile')->name('admin.image.upload');
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
    Route::any('/forgot/password/reset/{id}/{token}', 'AdminController@resetPasswordForm')
                ->name('admin.reset.password');
    // Route::get('/forgot/password/reset/{token}', 'AdminController@resetPassword')->name('');
});


/**************************************************************
                       Frontend
**************************************************************/
Route::prefix('/')
->middleware(['web'])
->group(function()
{
    Route::get('/', 'FrontendController@home')->name('frontend.home');
    Route::get('/shop', 'FrontendController@shop')->name('frontend.shop');
    Route::any('/shop/list', 'FrontendController@getProductList')->name('frontend.list');

    // Route::any('/shop/list', function(){
    //     echo 'hey';
    // });
});
