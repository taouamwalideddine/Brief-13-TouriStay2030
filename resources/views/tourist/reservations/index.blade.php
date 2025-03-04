@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Reservations</h1>
    @if ($reservations->isEmpty())
        <p>No reservations found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Listing</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->listing->location }}</td>
                        <td>{{ $reservation->check_in }}</td>
                        <td>{{ $reservation->check_out }}</td>
                        <td>${{ number_format($reservation->total_price, 2) }}</td>
                        <td>{{ ucfirst($reservation->status) }}</td>
                        <td>
                            <a href="{{ route('tourist.reservations.show', $reservation->id) }}" class="btn btn-info btn-sm">View</a>
                            <form action="{{ route('tourist.reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
