<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Auth::routes();
// cart routes
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
Route::get('/cart/downloadInvoice/{id}', 'App\Http\Controllers\CartController@downloadInvoice')->name('cart.downloadInvoice');
Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name('myaccount.orders');
// TradeItem routes
Route::get('/tradeItems', 'App\Http\Controllers\TradeItemController@index')->name('tradeItem.index');
Route::get('/tradeItem/yourItems', 'App\Http\Controllers\TradeItemController@userTradeItemsIndex')->name('tradeItem.userTradeItem');
Route::get('/tradeItem/create', 'App\Http\Controllers\TradeItemController@create')->name('tradeItem.create');
Route::post('/tradeItem/save', 'App\Http\Controllers\TradeItemController@save')->name('tradeItem.save');
Route::delete('/trade/{id}/delete', 'App\Http\Controllers\TradeItemController@delete')->name('tradeItem.delete');
Route::get('/tradeItem/{id}', 'App\Http\Controllers\TradeItemController@show')->name('tradeItem.show');
// Card routes
Route::get('/cards', 'App\Http\Controllers\CardController@index')->name('card.index');
Route::get('/cards/create', 'App\Http\Controllers\CardController@create')->name('card.create');
Route::post('/cards/save', 'App\Http\Controllers\CardController@save')->name('card.save');
Route::get('/cards/{id}', 'App\Http\Controllers\CardController@show')->name('card.show');
// Wishlist routes
Route::get('/wishlist', 'App\Http\Controllers\WishlistController@index')->name('wishlist.index');
Route::post('/wishlist/remove/{cardId}', 'App\Http\Controllers\WishlistController@remove')->name('wishlist.remove');
Route::post('/wishlist/add/{cardId}', 'App\Http\Controllers\WishlistController@add')->name('wishlist.add');
//Image Routes
Route::get('/image', 'App\Http\Controllers\ImageController@index')->name("image.index");
Route::post('/image/save', 'App\Http\Controllers\ImageController@save')->name("image.save");
// Admin Routes
Route::middleware(['auth', 'App\Http\Middleware\Admin'])->group(function () {
    Route::get('/admin/index', 'App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::get('/admin/cards/dashboard', 'App\Http\Controllers\AdminController@cardDashboard')->name('admin.card.dashboard');
    Route::get('/admin/trades/dashboard', 'App\Http\Controllers\AdminController@tradeDashboard')->name('admin.trade.dashboard');
    Route::get('/admin/trades/create', 'App\Http\Controllers\AdminController@createTradeItem')->name('admin.trade.create');
    Route::get('/admin/cards/create', 'App\Http\Controllers\AdminController@createCard')->name('admin.card.create');
    Route::post('/admin/trades/save', 'App\Http\Controllers\AdminController@saveTradeItem')->name('admin.tradeItem.save');
    Route::post('/admin/cards/save', 'App\Http\Controllers\AdminController@saveCard')->name('admin.card.save');
    Route::delete('/admin/trades/{id}/delete', 'App\Http\Controllers\AdminController@deleteTradeItem')->name('admin.trade.delete');
    Route::delete('/admin/cards/{id}/delete', 'App\Http\Controllers\AdminController@deleteCard')->name('admin.card.delete');
    Route::get('/admin/trades/{id}/update', 'App\Http\Controllers\AdminController@editTradeItem')->name('admin.trade.edit');
    Route::get('/admin/cards/{id}/update', 'App\Http\Controllers\AdminController@editCard')->name('admin.card.edit');
    Route::put('/admin/trades/{id}/update', 'App\Http\Controllers\AdminController@updateTradeItem')->name('admin.trade.update');
    Route::put('/admin/cards/{id}/update', 'App\Http\Controllers\AdminController@updateCard')->name('admin.card.update');
    Route::get('/admin/trades/{id}', 'App\Http\Controllers\AdminController@showTradeItem')->name('admin.trade.show');
    Route::get('/admin/cards/{id}', 'App\Http\Controllers\AdminController@showCard')->name('admin.card.show');
});
