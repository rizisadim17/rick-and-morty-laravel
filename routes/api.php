<?php

use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\EpisodeController;
use App\Http\Controllers\Api\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/characters', [CharacterController::class, 'index']);
Route::get('/characters/{id}', [CharacterController::class, 'show']);

Route::get('/episodes', [EpisodeController::class, 'index']);
Route::get('/episodes/{id}', [EpisodeController::class, 'show']);

Route::get('/locations/{id}', [LocationController::class, 'show']);

Route::get('/search/dimension', [LocationController::class, 'searchDimension']);
Route::get('/search/location', [LocationController::class, 'searchLocation']);

Route::get('/characters/location/{location}', [LocationController::class, 'charactersByLocation']);
Route::get('/characters/dimension/{dimension}', [LocationController::class, 'charactersByDimension']);
