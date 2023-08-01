<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [BookController::class, 'index']);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])
	->name('home');
