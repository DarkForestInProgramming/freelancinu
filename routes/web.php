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

Route::get('/register', [AuthController::class, 'registerPage']);
Route::get('/login', [AuthController::class, 'loginPage']);

Route::post('/register', [AuthController::class, 'registerForm']);
Route::post('/login', [AuthController::class, 'loginForm']);
Route::post('/logout', [AuthController::class, 'logoutForm']);

// Post related routes

Route::get('/create-post', [PostController::class, 'createPostPage']);
Route::get('/post/{post}', [PostController::class, 'singlePostPage']);

Route::post('/create-post', [PostController::class, 'storeNewPost']);
