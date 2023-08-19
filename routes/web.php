<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class, 'index']);
Route::get('/listings/{list}', [ListingController::class, 'show']);


// Naming Conventions
// index- Show all listings
// show- Show single listing
// create— Show form to create new listing
// store— Store new listing
// edit- Show form to edit listing
// update- Update listing
// destroy— Delete listing