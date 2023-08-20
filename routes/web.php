<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

// ? All Listings
Route::get('/', [ListingController::class, 'index']);
// ? Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);
// ? Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);
// ? Show Edit Form
Route::get('/listings/{list}/edit', [ListingController::class, 'edit']);
// ? Update Listing
Route::put('/listings/{list}/edit', [ListingController::class, 'update']);
// ? Single Listing
Route::get('/listings/{list}', [ListingController::class, 'show']);

// Naming Conventions
// index- Show all listings
// show- Show single listing
// create— Show form to create new listing
// store— Store new listing
// edit- Show form to edit listing
// update- Update listing
// destroy— Delete listing