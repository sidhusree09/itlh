@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Booking</h2>
    
    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
               
        <div class="form-group">
            <label for="service_id">Service:</label>
            <select class="form-control" id="service_id" name="service_id">
                @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->title }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" name="time">
        </div>        
        <div class="form-group">
            <label>Message</label>
            <textarea name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
