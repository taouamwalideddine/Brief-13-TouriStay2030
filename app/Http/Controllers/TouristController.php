<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class TouristController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $listings = Listing::all();
    return view('tourist.listings.index', compact('listings'));
}


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Listing $listing)
    {
        return view('tourist.listings.show', compact('listing'));
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
