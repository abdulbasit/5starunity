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

// Route::get('/main', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('home1', 'HomeController@index')->name('home1');


// Route::get('/home', 'HomeController@index');
// Route::get('/home', 'HomeController@index')->name('home');
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
    Route::get('logout', 'Auth\AdminLoginController@logout');

    //products routes
    Route::get('products', 'ProductController@index')->name('products');
    Route::get('product/create', 'ProductController@create')->name('product.create');
    Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::get('product/category/create', 'ProductController@createCategories')->name('product.category.create');
    Route::get('product/categories', 'ProductController@categories')->name('product.categories');
    Route::post('product/save', 'ProductController@saveProduct')->name('product.save');
    Route::post('product/delete_photo', 'ProductController@deletePhoto')->name('product.delete_photo');
    Route::post('product/update/{id}', 'ProductController@update')->name('product.update');
    Route::get('product/delete/{id}', 'ProductController@delete')->name('product.delete');
    //Lottries routes
    Route::get('lotteries', 'LottryController@index')->name('lotteries');
    Route::get('lottery/create', 'LottryController@create')->name('lottery.create');
    Route::post('lottery/save', 'LottryController@save')->name('lottery.save');
    Route::get('lottery/edit/{id}', 'LottryController@edit')->name('lottery.edit');
    Route::post('lottery/update/{id}', 'LottryController@update')->name('lottery.update');
    Route::get('lottery/delete/{id}', 'LottryController@delete')->name('lottery.delete');
    Route::get('lottery/detail/{id}', 'LottryController@detail')->name('lottery.detail');

    //Blog categories routes
    Route::get('blog', 'BlogController@index')->name('blog');
    Route::get('blog/create', 'BlogController@create')->name('blog.create');
    Route::post('blog/save', 'BlogController@saveBlog')->name('blog.save');
    Route::get('blog/delete/{id}', 'BlogController@delete');
    Route::get('blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
    Route::post('blog/delete_photo', 'BlogController@deletePhoto')->name('blog.delete_photo');
    Route::post('blog/update/{id}', 'BlogController@updateBlog')->name('blog.update');
    Route::post('blog/update/image', 'BlogController@upload_editor_image')->name('blog.update.image');
    //Blog categories routes
    Route::get('blog/category', 'BlogController@category')->name('blog.category');
    Route::get('blog/category/create', 'BlogController@createCategory')->name('blog.category.create');
    Route::post('blog/category/save', 'BlogController@saveCategory');
    Route::get('blog/category/delete/{id}', 'BlogController@deleteCategory');
    Route::get('blog/category/edit/{id}', 'BlogController@editCategory')->name('blog.category.edit');
    Route::post('blog/category/update/{id}', 'BlogController@updateCategory');
});
