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

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        // Session::flash("message","Listing created successfully");
        return redirect('/')->with("message", "Listing created successfully");
    }

    // Show Edit Form
    public function edit(Listing $list)
    {
        return view(
            'listings.edit',
            ['list' => $list]
        );
    }

    // Store listing data
    public function update(Request $request, Listing $list)
    {
        // Make sure that user is the owner of the listing
        if ($list->user_id != auth()->id()) abort(403, "Unauthorized action");

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $list->update($formFields);

        return back()->with("message", "Listing update successfully");
    }

    // Delete Listing
    public function destroy(Listing $list)
    {
        if ($list->user_id != auth()->id()) abort(403, "Unauthorized action");
        $list->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage Listing
    // Manage Listing
    public function manage()
    {
        $listings = auth()->user()->listings; // Retrieve listings associated with the authenticated user

        return view('listings.manage', ['listings' => $listings]);
    }
}
