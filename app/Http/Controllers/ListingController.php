<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Listing;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::all();
        return view('listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'price' => 'required|numeric',
            'amenities' => 'required|string',
            'available_from' => 'required|date',
            'available_to' => 'required|date',
        ]);

        // Get the authenticated user's ID
        $user_id = Auth::id();

        // Create the listing with the validated data and user_id
        Listing::create([
            'user_id' => $user_id,
            'location' => $request->location,
            'price' => $request->price,
            'amenities' => $request->amenities,
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
        ]);

        return redirect()->route('listings.index')->with('success', 'Listing created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $request->validate([
            'location' => 'required|string',
            'price' => 'required|numeric',
            'amenities' => 'required|string',
            'available_from' => 'required|date',
            'available_to' => 'required|date',
        ]);

        // Update the listing
        $listing->update([
            'location' => $request->location,
            'price' => $request->price,
            'amenities' => $request->amenities,
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
        ]);

        return redirect()->route('listings.index')->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        // Delete the listing
        $listing->delete();

        return redirect()->route('listings.index')->with('success', 'Listing deleted successfully.');
    }
}
