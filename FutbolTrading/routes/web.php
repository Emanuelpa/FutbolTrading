<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::middleware('auth')->group(function () {
    // TradeProduct Routes
    Route::get('/tradeProduct/yourItems', 'App\Http\Controllers\TradeProductController@userTradeProductsIndex')->name('tradeProduct.userTradeProduct');
    Route::get('/tradeProduct/create', 'App\Http\Controllers\TradeProductController@create')->name('tradeProduct.create');
    Route::post('/tradeProduct/save', 'App\Http\Controllers\TradeProductController@save')->name('tradeProduct.save');
    Route::delete('/trade/{id}/delete', 'App\Http\Controllers\TradeProductController@delete')->name('tradeProduct.delete');
    // Card Routes
    Route::get('/cards/create', 'App\Http\Controllers\CardController@create')->name('card.create');
    Route::post('/cards/save', 'App\Http\Controllers\CardController@save')->name('card.save');
    // Wishlist routes
    Route::get('/wishlist', 'App\Http\Controllers\WishlistController@index')->name('wishlist.index');
    Route::post('/wishlist/remove/{cardId}', 'App\Http\Controllers\WishlistController@remove')->name('wishlist.remove');
    Route::post('/wishlist/add/{cardId}', 'App\Http\Controllers\WishlistController@add')->name('wishlist.add');
    //Cart Routes
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    Route::get('/cart/downloadInvoice/{id}', 'App\Http\Controllers\CartController@downloadInvoice')->name('cart.downloadInvoice');
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name('myaccount.orders');
});

// Admin Routes
Route::middleware(['auth', 'App\Http\Middleware\Admin'])->group(function () {
    Route::get('/admin/index', 'App\Http\Controllers\AdminController@index')->name('admin.index');
    // TradeProduct Routes
    Route::get('/admin/trades/dashboard', 'App\Http\Controllers\Admin\AdminTradeProductController@dashboard')->name('admin.tradeProduct.dashboard');
    Route::get('/admin/trades/create', 'App\Http\Controllers\Admin\AdminTradeProductController@create')->name('admin.tradeProduct.create');
    Route::post('/admin/trades/save', 'App\Http\Controllers\Admin\AdminTradeProductController@save')->name('admin.tradeProduct.save');
    Route::delete('/admin/trades/{id}/delete', 'App\Http\Controllers\Admin\AdminTradeProductController@delete')->name('admin.tradeProduct.delete');
    Route::get('/admin/trades/{id}/update', 'App\Http\Controllers\Admin\AdminTradeProductController@edit')->name('admin.tradeProduct.edit');
    Route::put('/admin/trades/{id}/update', 'App\Http\Controllers\Admin\AdminTradeProductController@update')->name('admin.tradeProduct.update');
    Route::get('/admin/trades/{id}', 'App\Http\Controllers\Admin\AdminTradeProductController@show')->name('admin.tradeProduct.show');
    // Card Routes
    Route::get('/admin/cards/dashboard', 'App\Http\Controllers\Admin\AdminCardController@dashboard')->name('admin.card.dashboard');
    Route::get('/admin/cards/create', 'App\Http\Controllers\Admin\AdminCardController@create')->name('admin.card.create');
    Route::post('/admin/cards/save', 'App\Http\Controllers\Admin\AdminCardController@save')->name('admin.card.save');
    Route::delete('/admin/cards/{id}/delete', 'App\Http\Controllers\Admin\AdminCardController@delete')->name('admin.card.delete');
    Route::get('/admin/cards/{id}/update', 'App\Http\Controllers\Admin\AdminCardController@edit')->name('admin.card.edit');
    Route::put('/admin/cards/{id}/update', 'App\Http\Controllers\Admin\AdminCardController@update')->name('admin.card.update');
    Route::get('/admin/cards/{id}', 'App\Http\Controllers\Admin\AdminCardController@show')->name('admin.card.show');
});

// Home Route
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
// Auth Routes
Auth::routes();
// Cart routes
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::delete('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
// TradeProduct routes
Route::get('/tradeProducts', 'App\Http\Controllers\TradeProductController@index')->name('tradeProduct.index');
Route::get('/tradeProduct/{id}', 'App\Http\Controllers\TradeProductController@show')->name('tradeProduct.show');
Route::get('/tradeProducts/filter', 'App\Http\Controllers\TradeProductController@filterByType')->name('tradeProduct.filter');
// Card routes
Route::get('/cards', 'App\Http\Controllers\CardController@index')->name('card.index');
Route::get('/cards/search', 'App\Http\Controllers\CardController@search')->name('card.search');
Route::get('/cards/{id}', 'App\Http\Controllers\CardController@show')->name('card.show');
