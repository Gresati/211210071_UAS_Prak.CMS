<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddHomeController;
use App\Http\Controllers\AddContactController;
use App\Http\Controllers\AddProfileController;
use App\Http\Controllers\EmailController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [EmailController::class, 'store'])->name('email.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// CRUD routes for Home model
Route::get('/home', [AddHomeController::class, 'index'])->name('home.index');
Route::get('/home/create', [AddHomeController::class, 'create'])->name('home.create');
Route::post('/home', [AddHomeController::class, 'store'])->name('home.store');
Route::get('/home/{home}/edit', [AddHomeController::class, 'edit'])->name('home.edit');
Route::put('/home/{home}', [AddHomeController::class, 'update'])->name('home.update');
Route::delete('/home/{home}', [AddHomeController::class, 'destroy'])->name('home.destroy');



Route::get('/profiles', [AddProfileController::class, 'index'])->name('profile.index');
Route::get('/profiles/create', [AddProfileController::class, 'create'])->name('profile.create');
Route::post('/profiles', [AddProfileController::class, 'store'])->name('profile.store');
Route::get('/profiles/{profile}/edit', [AddProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profiles/{profile}', [AddProfileController::class, 'update'])->name('profile.update');
Route::delete('/profiles/{profile}', [AddProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/contacts', [AddContactController::class, 'index'])->name('contact.index');
Route::get('/contacts/create', [AddContactController::class, 'create'])->name('contact.create');
Route::post('/contacts', [AddContactController::class, 'store'])->name('contact.store');
Route::get('/contacts/{contact}/edit', [AddContactController::class, 'edit'])->name('contact.edit');
Route::put('/contacts/{contact}', [AddContactController::class, 'update'])->name('contact.update');
Route::delete('/contacts/{contact}', [AddContactController::class, 'destroy'])->name('contact.destroy');
