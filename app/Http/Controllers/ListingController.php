<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //wszystkie
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //pojedynczy
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // formualrz stworz
    public function create() {
        return view('listings.create');
    }

    // storuj
    public function store(Request $request) {
        $formFields = $request->validate([
            'movie' => ['required', Rule::unique('listings', 'movie')],
            'year' => 'required',
            'director' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Stworzono film!');
    }

    // Edytuj
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // update
    public function update(Request $request, Listing $listing) {
        
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'movie' => 'required',
            'year' => ['required'],
            'director' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Uaktualniono film!');
    }

    // Delete
    public function destroy(Listing $listing) {
        
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Film usunieto');
    }

    // Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
