<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('characters.index');
});

// Characters
Route::get('/character', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/character/{id}', [CharacterController::class, 'show'])->name('characters.show');

// Episodes
Route::get('/episode', [EpisodeController::class, 'index'])->name('episodes.index');
Route::get('/episode/{id}', [EpisodeController::class, 'show'])->name('episodes.show');

// Locations
Route::get('/location/{id}', [LocationController::class, 'show'])->name('locations.show');
Route::get('/search/characters/dimension', [LocationController::class, 'searchDimension'])->name('locations.search-dimension');
Route::get('/search/characters/location', [LocationController::class, 'searchLocation'])->name('locations.search-location');
Route::get('/characters/location/{location}', [LocationController::class, 'charactersByLocation'])->name('locations.characters-by-location');
Route::get('/characters/dimension/{dimension}', [LocationController::class, 'charactersByDimension'])->name('locations.characters-by-dimension');