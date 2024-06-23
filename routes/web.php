<?php

use App\Http\Controllers\ClubController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'w';
});



Route::resource('clubs', ClubController::class)->only(['index' , 'store']);

