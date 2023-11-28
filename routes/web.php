<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FollowController;
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

//@desc Public routes

Route::get('/', function() {
    return view('pages.home');
})->name('home');

Route::get('/get-subcategories/{category}', [CategoryController::class, 'getSubcategories']);
Route::get('/get-subsubcategories/{subcategory}', [CategoryController::class, 'getSubsubcategories']);
Route::get('/post/{post}', [PostController::class, 'singlePostPage']);
Route::get('/profile/{user:username}', [ProfileController::class, 'profilePage']);

//@desc Email related rooutes

Route::middleware(['signed'])->group(function () {
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $req) {
        $req->fulfill();
        return redirect('/')->with('success', 'El. paštas sėkmingai patvirtintas!');
    })->name('verification.verify');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/verify', [VerificationController::class, 'verifyPage'])->name('verification.notice');
    Route::get('/resend/verification/email', [VerificationController::class, 'resendEmail']);
});

 //@desc Auth/Guest related routes

Route::middleware('guest')->group(function () { 
Route::get('/register', [AuthController::class, 'registerPage']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/register', [AuthController::class, 'registerForm']);
Route::post('/login', [AuthController::class, 'loginForm']);
});

Route::post('/logout', [AuthController::class, 'logoutForm'])->middleware('auth');

// Post related routes

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/create-post', [PostController::class, 'createPostPage']);
    Route::post('/create-post', [PostController::class, 'storeNewPost']);
    Route::delete('/post/{post}', [PostController::class, 'deletePost'])->middleware('can:delete,post');
    Route::get('/post/{post}/edit', [PostController::class, 'editPostPage'])->middleware('can:update,post');
    Route::put('/post/{post}', [PostController::class, 'updatePost'])->middleware('can:update,post');
    Route::get('/search/{term}', [PostController::class, 'search']);
});

// Profile related routes

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/change-avatar', [ProfileController::class, 'avatarPage']);
    Route::post('/change-avatar', [ProfileController::class, 'changeAvatar']);
    Route::get('/profile/{user:username}/followers', [ProfileController::class, 'profileFollowers']);
    Route::get('/profile/{user:username}/following', [ProfileController::class, 'profileFollowing']);
    Route::post('/create-follow/{user:username}', [FollowController::class, 'createFollow']);
    Route::delete('/remove-follow/{user:username}', [FollowController::class, 'removeFollow']);
});

// Chat related routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/send-chat-message', [ChatController::class, 'chat']);
});

