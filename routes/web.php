<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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

//@desc Show page related routes

Route::get('/', [PageController::class, 'homePage']);
Route::get('/register', [PageController::class, 'registerPage']);
Route::get('/login', [PageController::class, 'loginPage']);
Route::get('/create-post', [PageController::class, 'createPostPage']);
Route::get('/post/{post}', [PageController::class, 'singlePostPage']);
Route::get('/get-subcategories/{category}', [PageController::class, 'getSubcategories']);
Route::get('/get-subsubcategories/{subcategory}', [PageController::class, 'getSubsubcategories']);


//@desc Auth related routes

Route::post('/register', [AuthController::class, 'registerForm']);
Route::post('/login', [AuthController::class, 'loginForm']);
Route::post('/logout', [AuthController::class, 'logoutForm']);

// Post related routes

Route::post('/create-post', [PostController::class, 'storeNewPost']);
