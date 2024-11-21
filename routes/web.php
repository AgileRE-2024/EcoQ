<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GardenController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaxonomyController;

Route::prefix('/api')->group(function () {
    Route::get('/kingdoms', [TaxonomyController::class, 'getKingdoms'])->name('taxonomy.kingdoms');
    Route::get('/phylums', [TaxonomyController::class, 'getPhylums'])->name('taxonomy.phylums');
    Route::get('/classes', [TaxonomyController::class, 'getClasses'])->name('taxonomy.classes');
    Route::get('/orders', [TaxonomyController::class, 'getOrders'])->name('taxonomy.orders');
    Route::get('/families', [TaxonomyController::class, 'getFamilies'])->name('taxonomy.families');
    Route::get('/genera', [TaxonomyController::class, 'getGenera'])->name('taxonomy.genuses');
    Route::get('/species', [TaxonomyController::class, 'getSpecies'])->name('taxonomy.species');
});
Route::prefix('/api')->group(function () {
    Route::get('/kingdoms', [TaxonomyController::class, 'getKingdoms'])->name('taxonomy.kingdom');
    Route::get('/phylums', [TaxonomyController::class, 'getPhylums'])->name('taxonomy.phylum');
    Route::get('/classes', [TaxonomyController::class, 'getClasses'])->name('taxonomy.class');
    Route::get('/orders', [TaxonomyController::class, 'getOrders'])->name('taxonomy.order');
    Route::get('/families', [TaxonomyController::class, 'getFamilies'])->name('taxonomy.family');
    Route::get('/genera', [TaxonomyController::class, 'getGenera'])->name('taxonomy.genus');
    Route::get('/species', [TaxonomyController::class, 'getSpecies'])->name('taxonomy.species');
});

Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/plants', [PageController::class, 'plants'])->name('plants');
Route::get('/events', action: [PageController::class, 'indexEvents'])->name('indexEvents');
Route::get('/gardens', action: [PageController::class, 'indexGardens'])->name('indexGardens');
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
