@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="text-center">
      <h2 class="text-2xl font-bold text-gray-800">Find Your Perfect Stay</h2>
      <p class="mt-4 text-lg text-gray-500">Browse through our curated collection of properties</p>
    </div>

    <!-- Listing Cards -->
    <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($listings as $listing)
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="h-48 bg-gray-200"></div>
          <div class="p-4">
            <h3 class="text-lg font-medium text-gray-900">{{ $listing->location }}</h3>
            <p class="text-sm text-gray-500 mt-1">{{ $listing->amenities }}</p>
            <p class="text-blue-500 font-bold mt-2">${{ $listing->price }}/night</p>
            <div class="mt-4">
              <a href="{{ route('tourist.listings.show', $listing) }}" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                View Details
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
