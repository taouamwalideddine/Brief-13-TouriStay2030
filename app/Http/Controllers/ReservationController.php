<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('tourist.reservations.index', compact('reservations'));
    }


    public function create(Listing $listing)
    {
        return view('tourist.reservations.create', compact('listing'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'listing_id' => 'required|exists:listings,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'total_price' => 'required|numeric|min:0',
        ]);

        Reservation::create([
            'listing_id' => $request->listing_id,
            'user_id' => Auth::id(), // Get the authenticated user's ID
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $request->total_price,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('tourist.reservations.index')->with('success', 'Reservation created successfully.');
    }


    public function show(Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('tourist.reservations.show', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $reservation->delete();

        return redirect()->route('tourist.reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
