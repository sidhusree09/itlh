@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $service->name }}</h1>
        <div class="row">
            <div class="col-md-6">             
            <img src="{{ asset('uploads/'.$service->image->path) }}" alt="{{$service->image->alt}}" class="img-fluid mb-4"/>                
            </div>
            <div class="col-md-6">
                <p><strong>Price:</strong> ${{ $service->price }}</p>
                <p><strong>Title:</strong> {{ $service->title }}</p>
                <p><strong>Description:</strong> {{ $service->description }}</p>
                <p><strong>Category:</strong> {{ $service->category->name }}</p>
                <p><strong>Location:</strong> {{ $service->location }}</p>
                <p><strong>Created:</strong> {{ $service->created_at }}</p>
                <a href="{{ route('services.edit', $service) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
