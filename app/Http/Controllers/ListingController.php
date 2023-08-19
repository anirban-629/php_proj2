<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view(
            'listings.index',
            [
                'heading' => 'Listings',
                'lists' => Listing::all()
            ]
        );
    }
    // Show single listing
    public function show(Listing $list)
    {
        return view(
            'listings.show',
            [
                'list' => $list
            ]
        );
    }
}
