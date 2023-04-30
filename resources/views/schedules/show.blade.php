@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Schedule Details</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Schedule ID</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $schedule->id }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Date</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $schedule->date }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Start Time</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $schedule->start_time }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">End Time</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $schedule->end_time }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Service</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $schedule->service->name }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Employee</label>

                            <div class="col-md-6">
                                <label class="col-form-label">{{ $schedule->employee->name }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
