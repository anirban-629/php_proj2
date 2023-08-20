<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view(
            'listings.index',
            [
                'heading' => 'Listings',
                // 'lists' => Listing::all()
                // 'lists' => Listing::latest()->get(),
                // 'lists' => Listing::latest()->filter(request(['tag', 'search']))->get(),

                'lists' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),
                
                // 'lists' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(2),
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

    // Show create form
    public function create(Listing $list)
    {
        return view(
            'listings.create'
        );
    }

    // Store listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);
        Listing::create($formFields);
        // Session::flash("message","Listing created successfully");
        return redirect('/')->with("message", "Listing created successfully");
    }
}
