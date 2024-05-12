<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('master-admin', function () {
    return "<h1>Halaman Master Admin</h1>";
})->middleware(["auth", "verified", "role:Master Admin"])->name("master-admin");

Route::get('admin', function () {
    return "<h1>Halaman Admin</h1>";
})->middleware(["auth", "verified", "role:Admin|Master Admin"])->name("admin");

Route::get('content', function () {
    return "<h1>Halaman Show Content</h1>";
})->middleware(["auth", "verified", "roleOrPermission:Show Content|Master Admin"])->name("content");

require __DIR__.'/auth.php';