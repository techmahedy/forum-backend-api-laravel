<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;

Route::group([ 'prefix' => 'v1' ], function () {
    
    Route::get('/users', [UserController::class,'index']);

    //Question route
    Route::get('/questions', [QuestionController::class,'index']);
    Route::get('/question/{question:question_slug}', [QuestionController::class,'show']);
    Route::post('/question', [QuestionController::class,'store']);
    Route::post('/question/{question:question_slug}', [QuestionController::class,'edit']);
    Route::delete('/question/{question:question_slug}', [QuestionController::class,'delete']);

    
});

