<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListingController; // Add this line
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Listing routes (protected by 'auth' and 'isOwner' middleware)
Route::middleware(['auth', 'isOwner'])->group(function () {
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
    Route::resource('listings', ListingController::class);
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

require __DIR__.'/auth.php';
