<?php

use App\Http\Controllers\ClubController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function (Request $request) {
    return 'test';
});

Route::post('/clubs', [ClubController::class, "store"]);

Route::get('/clubs', [ClubController::class, "index"]);

Route::get('/clubs/{id}',[ClubController::class, 'show']);

Route::delete('/clubs/{id}',[ClubController::class, 'destroy']);

Route::put('/clubs/{id}' , [ClubController::class, 'update']);

