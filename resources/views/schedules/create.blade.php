<!-- resources/views/schedule/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Add Schedule</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    
    <form action="{{ route('schedule.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="title" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
        <label for="category_id">Select Service</label>
        <select class="form-control" id="service_id" name="service_id">
            @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->title }}</option>
            @endforeach
        </select>
        </div>   
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
