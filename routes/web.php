<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

Route::get('/public/{username}', [PublicProfileController::class, 'show'])->name('public.show');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/newsItem', [HomeController::class, 'storeNewsItem'])->name('newsItem.store')->middleware('auth');
Route::get('/newsItem/create', [HomeController::class, 'createNewsItem'])->name('newsItem.create')->middleware('auth');
Route::get('/newsItem/{newsItem}/edit', [HomeController::class, 'editNewsItem'])->name('newsItem.edit')->middleware('auth');
Route::put('/newsItem/{newsItem}', [HomeController::class, 'updateNewsItem'])->name('newsItem.update')->middleware('auth');
Route::delete('/newsItem/{newsItem}', [HomeController::class, 'deleteNewsItem'])->name('newsItem.delete')->middleware('auth');

Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/users/{user}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.users.makeAdmin');
});