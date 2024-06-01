<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookController;



Route::get('/', [FacebookController::class, 'welcome']);


Route::post('/Get/Token', [FacebookController::class, 'getFacebookToken']);
Route::get('/Get/Pages', [FacebookController::class, 'getFacebookPages']);
Route::post('/Get/long-lived/Token/Expiration', [FacebookController::class, 'getNeverExpireToken']);
Route::post('/Get/Pages/Token/Expiration', [FacebookController::class, 'getTokenExpiration']);
Route::post('/post/message', [FacebookController::class,'postFacebook']);