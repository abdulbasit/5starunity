<?php
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index');
Route::get('news', 'BlogController@index')->name('news');
Route::get('cat-news/{cat_id}', 'BlogController@cat_blogs')->name('cat-news');
Auth::routes();


    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('mail/send', 'MailController@send');
    Auth::routes(['verify' => true]);
    Route::get('article/{slug}', 'BlogController@blogDetail');
    Route::get('home1', 'HomeController@index')->name('home1');
    Route::get('ceo', 'HomeController@ceo')->name('ceo');
    Route::get('partner', 'HomeController@partner')->name('partner');
    Route::get('howitworks', 'HomeController@howitworks')->name('howitworks');
    Route::get('inventro/acadmy', 'HomeController@inventroAcadmy')->name('inventro.acadmy');
    Route::get('about-us', 'HomeController@aboutUs')->name('about-us');
    Route::get('media-info', 'HomeController@MediaInfo')->name('media-info');
    Route::get('contact-us', 'HomeController@contactUs')->name('contact-us');

    Route::get('lotteries', 'LotteryController@index');
    Route::get('lottery/detail/{id}', 'LotteryController@detail');

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('register', 'Auth\RegisterController@index')->name('register');
    Route::post('register/save', 'Auth\RegisterController@create')->name('register.save');
    Route::get('email/verification/{token}', 'Auth\RegisterController@verify_email');
    Route::post('ajax/states', 'Auth\RegisterController@ajaxStates');
    Route::post('check_email', 'Auth\RegisterController@check_email');
    Route::post('check_email', 'Auth\RegisterController@check_email')->name('check_email');


    //client side routing for logged in user
    Route::group(['middleware' => ['auth:client']], function () {
        Route::get('profile', 'UserController@index')->name('profile')->middleware('verified');
        Route::post('change-email', 'UserController@change_mail')->name('change-email');

        Route::get('account-settings', 'UserController@profileUpdate')->name('account-settings');
        Route::get('profile-image', 'UserController@immage_upload')->name('profile-image');
        Route::match(['get', 'post'], 'ajax-image-upload', 'Auth\RegisterController@ajaxImage');
        Route::post('profile-update', 'UserController@update')->name('profile-update');
        Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

        Route::post('post-comment', 'BlogController@post_comment')->name('post-comment');
        Route::post('lottery/purchase', 'LotteryController@purchaseLottery')->name('lottery.purchase');
        Route::get('lottery/user/purchased', 'LotteryController@userPurchasedLotteries')->name('lottery.user.purchased');

        Route::get('wallet', 'WalletController@index')->name('wallet');
        Route::get('wallet/filter/{type}', 'WalletController@index')->name('wallets.filter');
        Route::get('lots/numbers/{id}', 'WalletController@detail')->name('lots.numbers');


        Route::get('kalarna', 'WalletController@kalarna')->name('kalarna');
        Route::get('paypal', 'WalletController@paypal')->name('paypal');
        Route::post('credit_card', 'WalletController@credit_card')->name('credit_card');
        Route::post('balance/purchase', 'WalletController@donated')->name('balance.purchase');
        Route::get('response', 'WalletController@response')->name('response');
    });
    Route::get('balance/capturePayment', 'WalletController@capturePayment')->name('balance.capturePayment');
    Route::get('redirectBack', 'WalletController@redirectBack')->name('redirectBack');



    Route::group(['prefix' =>'admin','namespace'=>'Admin','as' => 'admin.'], function () {
        //site settings
        Route::get('settings', 'AdminController@index')->name('settings');
        Route::post('settings/save', 'AdminController@saveSettings')->name('settings.save');
            // Authentication Routes...
        Route::get('/', function () {
            return redirect(route("admin.login"));
        });
        Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\AdminLoginController@login');
        // Password Reset Routes...
        Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('users', 'UserController@index')->name('users');
        Route::get('user/edit', 'UserController@index')->name('user.edit');
        Route::get('user/create', 'UserController@create')->name('user.create');
        Route::get('user/documents/{id}', 'UserController@userDocuments')->name('user.documents');
        Route::get('user/documents/approve/{id}', 'UserController@approve')->name('user.documents.approve');
        Route::post('user/documents/cancel/{id}', 'UserController@cancel')->name('user.documents.cancel');
        Route::get('user/documents/download/{id}', 'UserController@download')->name('user.documents.download');
        Route::get('user/status/{id}/{status}', 'UserController@update_status')->name('user.status');
        Route::get('user/credit/history/{id}', 'UserController@creditHistory')->name('user.credit.history');
        Route::get('user/credit/filter/history/{id}/{type}', 'UserController@creditHistory')->name('user.credit.filter.history');
        Route::post('user/trans/log/{id}/', 'UserController@transLog')->name('user.trans.log');
        Route::get('user/trans/history/{id}/', 'UserController@transactionHistory')->name('user.trans.history');

        Route::get('logout', 'Auth\AdminLoginController@logout');

        //products routes
        Route::get('products', 'ProductController@index')->name('products');
        Route::post('ajax/check_class', 'ProductController@check_class')->name('ajax.check_class');
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
        //Testimonial routes
        Route::get('testimonials', 'TestimonialController@index')->name('testimonials');
        Route::get('testimonials/create', 'TestimonialController@create')->name('testimonials.create');
        Route::post('testimonials/save', 'TestimonialController@save');
        Route::get('testimonials/edit/{id}', 'TestimonialController@edit')->name('testimonial.edit');
        Route::post('testimonials/update/{id}', 'TestimonialController@update')->name('testimonials.update');
        Route::get('testimonials/delete/{id}', 'TestimonialController@delete')->name('testimonials.delete');
        //Slider routes
        Route::get('sliders', 'SliderController@index')->name('sliders');
        Route::get('slider/create', 'SliderController@create')->name('slider.create');
        Route::post('slider/save', 'SliderController@saveSlider')->name('slider.save');
        Route::get('slider/delete/{id}', 'SliderController@deleteSlider')->name('slider.delete');
});
