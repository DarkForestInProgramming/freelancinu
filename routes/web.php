<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

//@desc Unlerated routes

Route::get('/', [AuthController::class, 'homePage'])->name('home');

// @desc Category related routes

Route::get('/get-subcategories/{category}', [CategoryController::class, 'getSubcategories']);
Route::get('/get-subsubcategories/{subcategory}', [CategoryController::class, 'getSubsubcategories']);

//@desc Auth related routes

Route::get('/register', [AuthController::class, 'registerPage'])->middleware('guest');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login')->middleware('guest');

Route::post('/register', [AuthController::class, 'registerForm'])->middleware('guest');
Route::post('/login', [AuthController::class, 'loginForm'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logoutForm'])->middleware('auth');

// Post related routes

Route::get('/create-post', [PostController::class, 'createPostPage'])->middleware('auth');
Route::get('/post/{post}', [PostController::class, 'singlePostPage']);

Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('auth');
