<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GardenController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;

Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/plants', [PageController::class, 'plants'])->name('plants');
Route::get('/plants/{plant}', [PageController::class, 'showPlant'])->name('plant');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('plants', PlantController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('events', EventController::class);
    Route::resource('gardens', GardenController::class);
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('comments', CommentController::class)->only(['store', 'destroy']);
});

require __DIR__ . '/auth.php';
