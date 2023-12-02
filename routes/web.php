<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [CategoryController::class, 'getCategories'])->name('home');

Route::get('/get-subcategories/{category}', [CategoryController::class, 'getSubcategories']);
Route::get('/get-subsubcategories/{subcategory}', [CategoryController::class, 'getSubsubcategories']);
Route::get("/topic/{post:slug}", [PostController::class, 'singlePostPage']);
Route::get('/profile/{user:slug}', [ProfileController::class, 'profilePage']);

//@desc Email related rootes

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
    Route::get('/create-topic', [PostController::class, 'createPostPage']);
    Route::post('/create-topic', [PostController::class, 'storeNewPost']);
    Route::delete('/topic/{post}', [PostController::class, 'deletePost'])->middleware('can:delete,post');
    Route::get('/topic/{post:slug}/edit', [PostController::class, 'editPostPage'])->middleware('can:update,post');
    Route::put('/topic/{post}', [PostController::class, 'updatePost'])->middleware('can:update,post');
    Route::get('/search/{term}', [PostController::class, 'search']);
});

// Profile related routes

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/change-avatar', [ProfileController::class, 'avatarPage']);
    Route::post('/change-avatar', [ProfileController::class, 'changeAvatar']);
    Route::get('/profile/{user:slug}/followers', [ProfileController::class, 'profileFollowers']);
    Route::get('/profile/{user:slug}/following', [ProfileController::class, 'profileFollowing']);
    Route::post('/create-follow/{user:slug}', [FollowController::class, 'createFollow']);
    Route::delete('/remove-follow/{user:slug}', [FollowController::class, 'removeFollow']);
});

// Chat related routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/send-chat-message', [ChatController::class, 'chat']);
});

// Category related routes

Route::get('/category/{category:slug}', [CategoryController::class, 'showCategory']);
Route::get('/subcategory/{subcategory:slug}', [CategoryController::class, 'showSubcategory']);
Route::get('/subsubcategory/{subsubcategory:slug}', [CategoryController::class, 'showSubsubcategory']);

// Comments related routes
Route::middleware(['auth', 'verified'])->group(function () {
Route::post('/create-comment', [CommentController::class, 'storeComment']);
Route::delete('/comment/{comment}', [CommentController::class, 'deleteComment']);
});

