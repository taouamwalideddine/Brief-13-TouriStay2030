@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservation Details</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Listing:</strong> {{ $reservation->listing->location }}</p>
            <p><strong>Check-In:</strong> {{ $reservation->check_in }}</p>
            <p><strong>Check-Out:</strong> {{ $reservation->check_out }}</p>
            <p><strong>Total Price:</strong> ${{ number_format($reservation->total_price, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($reservation->status) }}</p>
        </div>
    </div>
</div>
@endsection
