@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Listing</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Update your property listing</p>
      </div>
      <div class="border-t border-gray-200 p-6">
        <form action="{{ route('owner.listings.update', $listing) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="space-y-6">
            <div>
              <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
              <input type="text" name="location" id="location" value="{{ $listing->location }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
              <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
              <input type="number" name="price" id="price" value="{{ $listing->price }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
              <label for="amenities" class="block text-sm font-medium text-gray-700">Amenities</label>
              <textarea name="amenities" id="amenities" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $listing->amenities }}</textarea>
            </div>
            <div>
              <label for="available_from" class="block text-sm font-medium text-gray-700">Available From</label>
              <input type="date" name="available_from" id="available_from" value="{{ $listing->available_from }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
              <label for="available_to" class="block text-sm font-medium text-gray-700">Available To</label>
              <input type="date" name="available_to" id="available_to" value="{{ $listing->available_to }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div class="flex justify-end">
              <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Update Listing
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
