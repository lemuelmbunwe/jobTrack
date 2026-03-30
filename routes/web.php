<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('applications' , ApplicationController::class);


//create user
Route::get('/register' , [RegisterUserController::class , 'index']);
Route::post('/register' , [RegisterUserController::class , 'store']);


//login User
Route::get('/login' , [SessionController::class , 'create']);
Route::post('/login' , [SessionController::class , 'store']);
Route::post('/logout' , [SessionController::class , 'destroy']);

