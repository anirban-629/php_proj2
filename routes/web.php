<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ? All Listings
Route::get('/', [ListingController::class, 'index']);
// ? Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// ? Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
// ? Show Edit Form
Route::get('/listings/{list}/edit', [ListingController::class, 'edit']);
// ? Update Listing
Route::put('/listings/{list}/edit', [ListingController::class, 'update'])->middleware('auth');
// ? Delete Listing
Route::delete('/listings/{list}', [ListingController::class, 'destroy']);
// ? Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
// ? Single Listing
Route::get('/listings/{list}', [ListingController::class, 'show']);




// * Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// * Create New User
Route::post('/users', [UserController::class, 'store']);
// * Log Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// * Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// * Log User In
Route::post('/users/authenticate', [UserController::class, 'authenticate']);











// Naming Conventions
// index- Show all listings
// show- Show single listing
// create— Show form to create new listing
// store— Store new listing
// edit- Show form to edit listing
// update- Update listing
// destroy— Delete listing