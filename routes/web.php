<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FixtureController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');

Route::get('/public/{username}', [PublicProfileController::class, 'show'])->name('public.show');

Route::get('/profile', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::post('/newsItem', [HomeController::class, 'storeNewsItem'])->name('newsItem.store');
    Route::get('/newsItem/create', [HomeController::class, 'createNewsItem'])->name('newsItem.create');
    Route::get('/newsItem/{newsItem}/edit', [HomeController::class, 'editNewsItem'])->name('newsItem.edit');
    Route::put('/newsItem/{newsItem}', [HomeController::class, 'updateNewsItem'])->name('newsItem.update');
    Route::delete('/newsItem/{newsItem}', [HomeController::class, 'deleteNewsItem'])->name('newsItem.delete');
});
Route::post('/newsItem/{newsItem}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/users/{user}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.users.makeAdmin');
});

Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/faq/create', [FAQController::class, 'create'])->name('faq.create');
    Route::post('/faq', [FAQController::class, 'store'])->name('faq.store');
    Route::get('/faq/{faq}/edit', [FAQController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/{faq}', [FAQController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faq}', [FAQController::class, 'destroy'])->name('faq.destroy');
});

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/fixtures', [FixtureController::class, 'index'])->name('fixtures.index');

Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/fixtures/create', [FixtureController::class, 'create'])->name('fixtures.create');
    Route::post('/fixtures', [FixtureController::class, 'store'])->name('fixtures.store');
    Route::delete('/fixtures/{fixture}', [FixtureController::class, 'destroy'])->name('fixtures.destroy');
});