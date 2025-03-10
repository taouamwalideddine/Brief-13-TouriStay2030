<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{


    public function index()
    {

    $listings = Auth::user()->listings;
    return view('owner.listings.index', compact('listings'));
    }



    public function create()
    {
        return view('owner.listings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'price' => 'required|numeric',
            'amenities' => 'required|string',
            'available_from' => 'required|date',
            'available_to' => 'required|date',
        ]);

        $user_id = Auth::id();

        Listing::create([
            'user_id' => $user_id,
            'location' => $request->location,
            'price' => $request->price,
            'amenities' => $request->amenities,
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
        ]);

        return redirect()->route('owner.listings.index')->with('success', 'Listing created successfully.');
    }


    public function show(Listing $listing)
    {
        if ($listing->user_id !== Auth::id()) {
            return redirect()->route('owner.listings.index')->with('error', 'You do not have access to this listing.');
        }
        return view('owner.listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        if ($listing->user_id !== Auth::id()) {
            return redirect()->route('owner.listings.index')->with('error', 'You do not have access to this listing.');
        }

        return view('owner.listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id !== Auth::id()) {
            return redirect()->route('owner.listings.index')->with('error', 'You do not have access to this listing.');
        }

        $request->validate([
            'location' => 'required|string',
            'price' => 'required|numeric',
            'amenities' => 'required|string',
            'available_from' => 'required|date',
            'available_to' => 'required|date',
        ]);

        $listing->update($request->all());

        return redirect()->route('owner.listings.index')->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        if ($listing->user_id !== Auth::id()) {
            return redirect()->route('owner.listings.index')->with('error', 'You do not have access to this listing.');
        }

        $listing->delete();

        return redirect()->route('owner.listings.index')->with('success', 'Listing deleted successfully.');
    }
}
