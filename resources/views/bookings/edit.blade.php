@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Booking</h1>

        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="service_id">Service</label>
                <select class="form-control" name="service_id" id="service_id">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $service->id == $booking->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="user_id">User</label>
                <select class="form-control" name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $booking->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ $booking->date }}">
            </div>

            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" name="time" id="time" value="{{ $booking->time }}">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Booking</button>
        </form>
    </div>
@endsection
