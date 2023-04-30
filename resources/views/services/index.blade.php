@extends('layouts.app')

@section('content')
    <h1>Services</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('services.create') }}" class="btn btn-primary">Create Service</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td><img src="{{ asset('uploads/'.$service->image->path) }}" width="80" height="60" alt="{{$service->image->alt}}"/></td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->category->name }}</td>
                    <td>{{ substr($service->description, 0,70) }}...</td>
                    <td>{{ $service->price }}</td>
                    <td>
                        <a href="{{ route('services.show', $service) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
