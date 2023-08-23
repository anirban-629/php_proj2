<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class, 'index']);
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
Route::get('/listings/{list}/edit', [ListingController::class, 'edit']);
Route::put('/listings/{list}/edit', [ListingController::class, 'update'])->middleware('auth');
Route::delete('/listings/{list}', [ListingController::class, 'destroy']);
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
Route::get('/listings/{list}', [ListingController::class, 'show']);




Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
