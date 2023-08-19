<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(
        'listings',
        [
            'heading' => 'Listings',
            'lists' => Listing::all()
        ]
    );
});

//? single list
//? Route Model Binding.
Route::get('/listings/{list}', function (Listing $list) {
    return view(
        'listing',
        [
            'list' => $list
        ]
    );
});
