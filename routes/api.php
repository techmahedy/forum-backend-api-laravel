<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([ 'prefix' => 'v1' ], function () {
    
    Route::get('/users', [UserController::class,'getAllActiveUsers']);


});

