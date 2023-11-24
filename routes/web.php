<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//@desc Show page routes

Route::get('/', [PageController::class, 'homePage']);
Route::get('/register', [PageController::class, 'registerPage']);
Route::get('/login', [PageController::class, 'loginPage']);

//@desc Auth routes

Route::post('/register', [AuthController::class, 'registerForm']);
Route::post('/login', [AuthController::class, 'loginForm']);
Route::post('/logout', [AuthController::class, 'logoutForm']);


