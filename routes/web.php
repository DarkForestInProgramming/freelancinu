<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::fallback(function () {
    return redirect('/');
});

Route::get('/', function() {
    return view('pages.home');
})->name('home');

//@desc Email related rooutes

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $req) {
    $req->fulfill();
    return redirect('/')->with('success', 'El. paštas sėkmingai patvirtintas!');
})->middleware(['signed'])->name('verification.verify');


Route::middleware(['auth'])->group(function () {
    Route::get('/verify', [VerificationController::class, 'verifyPage'])->name('verification.notice');
    Route::get('/resend/verification/email', [VerificationController::class, 'resendEmail']);
});

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

Route::get('/create-post', [PostController::class, 'createPostPage'])->middleware('auth', 'verified');
Route::get('/post/{post}', [PostController::class, 'singlePostPage']);

Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('auth', 'verified');
Route::delete('/post/{post}', [PostController::class, 'deletePost'])->middleware('can:delete,post');
Route::get('/post/{post}/edit', [PostController::class, 'editPostPage'])->middleware('can:update,post');
Route::put('/post/{post}', [PostController::class, 'updatePost'])->middleware('can:update,post');

// Profile related routes

Route::get('/profile/{user:username}', [ProfileController::class, 'profilePage']);
Route::get('/change-avatar', [ProfileController::class, 'avatarPage'])->middleware('auth', 'verified');
Route::post('/change-avatar', [ProfileController::class, 'changeAvatar'])->middleware('auth', 'verified');

