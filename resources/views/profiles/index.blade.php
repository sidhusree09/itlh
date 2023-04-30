@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User Profiles</h2>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $profile->user->name }}</td>
                        <td>{{ $profile->user->email }}</td>
                        <td>{{ $profile->phone }}</td>
                        <td>
                            <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
