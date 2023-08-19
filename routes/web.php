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

// single list
Route::get('/listings/{id}', function ($id) {
    $list = Listing::find($id);
    if ($list) {
        return view(
            'listing',
            [
                'list' => $list
            ]
        );
    } else abort(404);
});
