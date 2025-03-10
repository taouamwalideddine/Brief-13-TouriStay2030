@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">My Reservations</h1>
    @if ($reservations->isEmpty())
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
            <p>No reservations found.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Listing</th>
                        <th class="py-3 px-4 text-left">Check-In</th>
                        <th class="py-3 px-4 text-left">Check-Out</th>
                        <th class="py-3 px-4 text-left">Total Price</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ $reservation->listing->location }}</td>
                            <td class="py-3 px-4 border-b">{{ $reservation->check_in }}</td>
                            <td class="py-3 px-4 border-b">{{ $reservation->check_out }}</td>
                            <td class="py-3 px-4 border-b">${{ number_format($reservation->total_price, 2) }}</td>
                            <td class="py-3 px-4 border-b">
                                <span class="inline-block px-3 py-1 text-sm font-semibold rounded
                                    @if($reservation->status === 'pending') bg-yellow-200 text-yellow-800
                                    @elseif($reservation->status === 'confirmed') bg-green-200 text-green-800
                                    @else bg-red-200 text-red-800
                                    @endif">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 border-b">
                                <a href="{{ route('tourist.reservations.show', $reservation->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                <form action="{{ route('tourist.reservations.destroy', $reservation->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
