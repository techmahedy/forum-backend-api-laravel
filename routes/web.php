<?php

use Illuminate\Support\Facades\Route;

Route::view('/{any?}', 'home');

Route::view('/{any?}/{any1?}', 'home');