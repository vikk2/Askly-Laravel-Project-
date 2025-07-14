<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;


Route::get('/', [HomepageController::class, 'index'])->name('home');

// register page
Route::get('/sign-up-page', [AuthController::class, 'showRegisterForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');


// login page
Route::get('/log-in-page', function () {
    return view('log-in');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);


// profile
// Route::get('/{username}/profile', [ProfileController::class, 'show'])
//     ->middleware('auth')
//     ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/{username}/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/{username}/profile', [ProfileController::class, 'show'])->name('profile');

    // edit profile info
    Route::get('/{username}/settings', [ProfileController::class, 'edit'])->name('settings');
    Route::post('/{username}/settings', [ProfileController::class, 'update'])->name('settingsUpdate');
});

// article
Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class);
});

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// legal link
Route::view('/terms', 'legal.terms')->name('terms');
Route::view('/privacy', 'legal.privacy')->name('privacy');




// Article all users can see
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{article}', [BlogController::class, 'publicShow'])->name('blog.show');

// FAQ page
Route::view('/FAQ', 'faq')->name('faq');

// contact us page
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// about page
Route::view('/about', 'about')->name('about');



// comment section
Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

// forgot password

Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', [PasswordResetLinkController::class, 'showLinkReset'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetLinkController::class, 'storeNewPass'])->name('password.update');
    Route::get('/password-reset-sent', function () {
        return view('auth.AfterSending');  // make sure blade file is resources/views/AfterSending.blade.php
    })->name('password.sent');
});




// public user (always at the very end)
Route::get('/{username}', [AuthorController::class, 'showByUsername'])->name('author.byUsername');



