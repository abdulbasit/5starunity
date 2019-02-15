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
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
//start of admin routes
Route::group(['prefix' =>'admin','namespace'=>'Admin','as' => 'admin.'], function () {

    // Authentication Routes...
    Route::get('/', function () {
        return redirect(route("admin.login"));
    });
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\AdminLoginController@login');
    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('users', 'UserController@index')->name('users');
    Route::get('user/create', 'UserController@create')->name('user.create');
    Route::get('user/documents', 'UserController@documents')->name('user.documents');

    //products routes
    Route::get('products', 'ProductController@index')->name('products');
    Route::get('product/create', 'ProductController@create')->name('product.create');
    Route::get('product/category/create', 'ProductController@createCategories')->name('product.category.create');
    Route::get('product/categories', 'ProductController@categories')->name('product.categories');
    Route::post('product/save', 'ProductController@saveProduct')->name('product.save');
    //Lottries routes
    Route::get('lotteries', 'LottryController@index')->name('lotteries');
    Route::get('lottery/create', 'LottryController@create')->name('lottery.create');
});
