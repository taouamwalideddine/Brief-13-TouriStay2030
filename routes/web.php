<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (for authenticated users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (for authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Owner routes (protected by 'auth' and 'isOwner' middleware)
Route::middleware(['auth', 'isOwner'])->group(function () {
    Route::resource('owner/listings', OwnerController::class)->names([
        'index' => 'owner.listings.index',
        'create' => 'owner.listings.create',
        'store' => 'owner.listings.store',
        'show' => 'owner.listings.show',
        'edit' => 'owner.listings.edit',
        'update' => 'owner.listings.update',
        'destroy' => 'owner.listings.destroy',
    ]);
});

// Auth routes (login, register, password reset, etc.)
require __DIR__.'/auth.php';
