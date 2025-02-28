<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TouristController;

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




// Tourist routes (protected by 'auth' and 'isTourist' middleware)
Route::middleware(['auth', 'isTourist'])->group(function () {
    // Route to list all listings (index page)
    Route::get('tourist/listings', [TouristController::class, 'index'])->name('tourist.listings.index');

    // Route to show a single listing
    Route::get('tourist/listings/{listing}', [TouristController::class, 'show'])->name('tourist.listings.show');
});

require __DIR__.'/auth.php';
