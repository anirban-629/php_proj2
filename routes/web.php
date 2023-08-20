<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

// ? All listings
Route::get('/', [ListingController::class, 'index']);
// ? Show create form
Route::get('/listings/create', [ListingController::class, 'create']);
// ? Store listing data
Route::post('/listings', [ListingController::class, 'store']);
// ? Single listing
Route::get('/listings/{list}', [ListingController::class, 'show']);

// Naming Conventions
// index- Show all listings
// show- Show single listing
// create— Show form to create new listing
// store— Store new listing
// edit- Show form to edit listing
// update- Update listing
// destroy— Delete listing