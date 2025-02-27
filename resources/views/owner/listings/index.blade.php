@extends('layouts.app')

@section('title', 'My Listings')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">My Listings</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Properties you've listed for rent</p>
        </div>
        <a href="{{ route('owner.listings.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md
                  font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700
                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
            Create New
        </a>
    </div>

    <!-- Listing Cards Grid -->
    <div class="border-t border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach($listings as $listing)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-200"></div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg">{{ $listing->location }}</h4>
                        <p class="text-gray-600 mt-2">${{ $listing->price }}/night</p>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('owner.listings.show', $listing) }}"
                               class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                View Details
                            </a>
                            <span class="text-sm text-gray-500">
                                {{ $listing->available_from->format('M d, Y') }} -
                                {{ $listing->available_to->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
