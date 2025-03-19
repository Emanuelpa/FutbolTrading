<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Auth::routes();
// cart routes
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::delete('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

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
//Wishlist routes
Route::get('/wishlist', 'App\Http\Controllers\WishlistController@index')->name('wishlist.index');
Route::delete('/wishlist/remove/{card}', 'App\Http\Controllers\WishlistController@remove')->name('wishlist.remove');