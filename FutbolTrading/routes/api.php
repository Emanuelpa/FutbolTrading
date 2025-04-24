<?php
// Emanuel Patiño

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cards', 'App\Http\Controllers\Api\CardApiController@index')->name('api.card.index');