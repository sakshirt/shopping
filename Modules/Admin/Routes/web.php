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

    //---------------------------------------------
    //    Route::get('/', 'AdminController@register');
    //----------------------------------------------

    //    Route::get('/', 'AdminController@index');

    Route::get('/register', 'AdminController@register')->name('admin.register');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::any('/register/store', 'AdminController@userStore');
//    Route::post('/register/store', function() {
//        $user = $request->all();
//        User::storeRegister();
//    });
});