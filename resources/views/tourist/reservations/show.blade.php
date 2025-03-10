@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Reservation Details</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <h5 class="text-xl font-semibold mb-4">Reservation #{{ $reservation->id }}</h5>
        <hr class="mb-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-gray-700"><strong>Listing:</strong> {{ $reservation->listing->location }}</p>
                <p class="text-gray-700"><strong>Check-In:</strong> {{ $reservation->check_in }}</p>
                <p class="text-gray-700"><strong>Check-Out:</strong> {{ $reservation->check_out }}</p>
            </div>
            <div>
                <p class="text-gray-700"><strong>Total Price:</strong> ${{ number_format($reservation->total_price, 2) }}</p>
                <p class="text-gray-700"><strong>Status:</strong>
                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded
                        @if($reservation->status === 'pending') bg-yellow-200 text-yellow-800
                        @elseif($reservation->status === 'confirmed') bg-green-200 text-green-800
                        @else bg-red-200 text-red-800
                        @endif">
                        {{ ucfirst($reservation->status) }}
                    </span>
                </p>
            </div>
        </div>
        <hr class="my-4">
        <a href="{{ route('tourist.reservations.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">Back to Reservations</a>
    </div>
</div>
@endsection
