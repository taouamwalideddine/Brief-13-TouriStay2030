<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\ReservationController;

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

// Owner routes (protected by 'auth' and 'isOwner' middleware)
Route::middleware(['isOwner'])->group(function () {
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

    Route::get('tourist/listings', [TouristController::class, 'index'])->name('tourist.listings.index');
    Route::get('tourist/listings/{listing?}', [TouristController::class, 'show'])->name('tourist.listings.show');
    Route::get('tourist/listings/{listing}/reserve', [ReservationController::class, 'create'])->name('tourist.reservations.create');
    Route::post('tourist/reservations', [ReservationController::class, 'store'])->name('tourist.reservations.store');
    Route::get('tourist/reservations', [ReservationController::class, 'index'])->name('tourist.reservations.index');
    Route::get('tourist/reservations/{reservation}', [ReservationController::class, 'show'])->name('tourist.reservations.show');
    Route::delete('tourist/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('tourist.reservations.destroy');

});

require __DIR__.'/auth.php';
