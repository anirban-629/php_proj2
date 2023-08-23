<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        return view(
            'listings.index',
            [
                'heading' => 'Listings',

                'lists' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),

            ]
        );
    }
    public function show(Listing $list)
    {
        return view(
            'listings.show',
            [
                'list' => $list
            ]
        );
    }

    public function create(Listing $list)
    {
        return view(
            'listings.create'
        );
    }

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
        return redirect('/')->with("message", "Listing created successfully");
    }

    public function edit(Listing $list)
    {
        return view(
            'listings.edit',
            ['list' => $list]
        );
    }

    public function update(Request $request, Listing $list)
    {
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

    public function destroy(Listing $list)
    {
        if ($list->user_id != auth()->id()) abort(403, "Unauthorized action");
        $list->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    public function manage()
    {
        $listings = auth()->user()->listings;

        return view('listings.manage', ['listings' => $listings]);
    }
}
