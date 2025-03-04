@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Reservation</h1>
    <form action="{{ route('tourist.reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="listing_id" value="{{ $listing->id }}">

        <div class="form-group">
            <label for="check_in">Check-In Date</label>
            <input type="date" name="check_in" id="check_in" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="check_out">Check-Out Date</label>
            <input type="date" name="check_out" id="check_out" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="number" name="total_price" id="total_price" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Reserve</button>
    </form>
</div>
@endsection
