<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');

Route::get('/details/{id}', 'DetailController@index')->name('detail');
Route::post('/details/{id}', 'DetailController@add')->name('detail-add');

Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');

Route::get('/success', 'CartController@success')->name('success');
Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::group(['middleware' =>['auth']], function(){
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');
    Route::post('/checkout', 'CheckoutController@process')->name('checkout');

    Route::get('/dashboard', 'DashboardController@index')
    ->name('dashboard');
    Route::get('/dashboard/products', 'DashboardProductController@index')
        ->name('dashboard-product');
    Route::get('/dashboard/products/create', 'DashboardProductController@create')
        ->name('dashboard-product-create');
    Route::get('/dashboard/products/{id}', 'DashboardProductController@details')
        ->name('dashboard-product-details');

    Route::get('/dashboard/transaction', 'DashboardTransactionController@index')
            ->name('dashboard-transaction');
    Route::get('/dashboard/transaction/{id}', 'DashboardTransactionController@details')
            ->name('dashboard-transaction-details');
    Route::post('/dashboard/transaction/{id}', 'DashboardTransactionController@update')
            ->name('dashboard-transaction-update');

    Route::get('/dashboard/setting', 'DashboardSettingController@store')
        ->name('dashboard-setting-store');
    Route::get('/dashboard/account', 'DashboardSettingController@account')
        ->name('dashboard-settings-account');
});

route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        route::get('/', 'DashboardController@index')->name('admin-dashboard');
        route::resource('category', 'CategoryController');
        route::resource('user', 'UserController');
        route::resource('product', 'ProductController');
        route::resource('product-gallery', 'ProductGalleryController');
    });

Auth::routes();


