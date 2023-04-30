@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Schedule</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('schedule.update', $schedule->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="title" id="name" class="form-control" value="{{ $schedule->title }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $schedule->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="service_id">Service:</label>
                                <select name="service_id" id="service_id" class="form-control">
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ $schedule->service_id == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start_time">Start Time:</label>
                                <input type="time" name="start_time" id="start_time" class="form-control" value="{{ $schedule->start_time }}">
                            </div>

                            <div class="form-group">
                                <label for="end_time">End Time:</label>
                                <input type="time" name="end_time" id="end_time" class="form-control" value="{{ $schedule->end_time }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
