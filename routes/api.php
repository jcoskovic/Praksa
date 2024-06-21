<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function (Request $request) {
    return 'test';
});


Route::resource('clubs', ClubController::class)->only(['store' , 'update' , 'show' , 'index' , 'destroy']);
Route::resource('users', UserController::class)->only([ 'index', 'show', 'destroy', 'store', 'update' ]);

