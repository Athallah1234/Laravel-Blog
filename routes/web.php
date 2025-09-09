<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\BackController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::get('/articles/tag/{tag}', [IndexController::class, 'tag'])->name('articles.tag');
Route::get('/articles', [IndexController::class, 'Articleindex'])->name('articles.index');
Route::get('/articles/{slug}', [IndexController::class, 'Articleshow'])->name('articles.show');
Route::get('/categories', [IndexController::class, 'Categoriindex'])->name('categories.index');
Route::get('/categories/{slug}', [IndexController::class, 'Categoriesshow'])->name('categories.show');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Forgot Password
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
// Reset Password
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/profile');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});

Route::middleware(['auth', 'verified', 'role:admin,user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dashboard', [BackController::class, 'index'])->name('admin.dashboard');
    // Users
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users.index');
    Route::get('/dashboard/users/create', [UserController::class, 'create'])->name('dashboard.users.create');
    Route::post('/dashboard/users', [UserController::class, 'store'])->name('dashboard.users.store');
    Route::get('/dashboard/users/{user}', [UserController::class, 'show'])->name('dashboard.users.show');
    Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::put('/dashboard/users/{user}', [UserController::class, 'update'])->name('dashboard.users.update');
    Route::delete('/dashboard/users/{user}', [UserController::class, 'destroy'])->name('dashboard.users.destroy');
    // Categories
    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('dashboard.categories.index');
    Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('dashboard.categories.create');
    Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('dashboard.categories.store');
    Route::get('/dashboard/categories/{category}', [CategoryController::class, 'show'])->name('dashboard.categories.show');
    Route::get('/dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::put('/dashboard/categories/{category}', [CategoryController::class, 'update'])->name('dashboard.categories.update');
    Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'destroy'])->name('dashboard.categories.destroy');
    // Articles
    Route::get('/dashboard/articles', [ArticleController::class, 'index'])->name('dashboard.articles.index');
    Route::get('/dashboard/articles/create', [ArticleController::class, 'create'])->name('dashboard.articles.create');
    Route::post('/dashboard/articles', [ArticleController::class, 'store'])->name('dashboard.articles.store');
    Route::get('/dashboard/articles/{article}', [ArticleController::class, 'show'])->name('dashboard.articles.show');
    Route::get('/dashboard/articles/{article}/edit', [ArticleController::class, 'edit'])->name('dashboard.articles.edit');
    Route::put('/dashboard/articles/{article}', [ArticleController::class, 'update'])->name('dashboard.articles.update');
    Route::delete('/dashboard/articles/{article}', [ArticleController::class, 'destroy'])->name('dashboard.articles.destroy');
});
