<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;

Route::group(['middleware' => 'api','prefix' => 'v1'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});

Route::group(['prefix' => 'v1'], function () {

    Route::get('/users', [UserController::class, 'index']);

    //Question route
    Route::get('/questions', [QuestionController::class, 'index']);
    Route::get('/question/{question:question_slug}', [QuestionController::class, 'show']);
    Route::post('/question', [QuestionController::class, 'store'])->middleware('jwt');
    Route::post('/question/{question:question_slug}', [QuestionController::class, 'edit'])->middleware('jwt');
    Route::delete('/question/{question:question_slug}', [QuestionController::class, 'delete'])->middleware('jwt');

    //Category Route
    Route::get('/categories', [CategoryController::class, 'index']);

    //Reply Route
    Route::get('/question/{question:question_slug}/reply', [ReplyController::class, 'index']);
    Route::post('/question/{question:question_slug}/reply', [ReplyController::class, 'store'])->middleware('jwt');

    //Like Route
    Route::post('/like/{reply}', [LikeController::class, 'like'])->middleware('jwt');

});

