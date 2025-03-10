@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Create Reservation</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('tourist.reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="listing_id" value="{{ $listing->id }}">

            <div class="mb-4">
                <label for="check_in" class="block text-sm font-medium text-gray-700">Check-In Date</label>
                <input type="date" name="check_in" id="check_in" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            <div class="mb-4">
                <label for="check_out" class="block text-sm font-medium text-gray-700">Check-Out Date</label>
                <input type="date" name="check_out" id="check_out" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            <div class="mb-4">
                <label for="total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                <input type="number" name="total_price" id="total_price" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" step="0.01" required>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Reserve</button>
                <a href="{{ route('tourist.listings.show', $listing->id) }}" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
