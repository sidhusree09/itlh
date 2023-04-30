<!-- resources/views/schedule/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Schedules</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('schedule.create') }}" class="btn btn-primary">Book Schedule</a>
    </div>        
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Service</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->title }}</td>
                    <td>{{ $schedule->description }}</td>
                    <td>{{ $schedule->service->title }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td>
                        <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
