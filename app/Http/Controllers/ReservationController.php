<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all reservations for the authenticated tourist
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('tourist.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Listing $listing)
    {
        return view('tourist.reservations.create', compact('listing'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'listing_id' => 'required|exists:listings,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Create the reservation
        Reservation::create([
            'listing_id' => $request->listing_id,
            'user_id' => Auth::id(), // Get the authenticated user's ID
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $request->total_price,
            'status' => 'pending', // Default status
        ]);

        // Redirect with success message
        return redirect()->route('tourist.reservations.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        // Ensure the authenticated user can only view their own reservations
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('tourist.reservations.show', compact('reservation'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        // Ensure the authenticated user can only delete their own reservations
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the reservation
        $reservation->delete();

        // Redirect with success message
        return redirect()->route('tourist.reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
