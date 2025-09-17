<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SocialAuthController;
Route::get('/resume', [ResumeController::class, 'index'])->name('resume.form');
Route::post('/resume/analyze', [ResumeController::class, 'analyze'])->name('resume.analyze');
Route::get('/', [AuthController::class, 'showLoginSignup'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/redirect/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/callback/{provider}', [SocialAuthController::class, 'callback']);
