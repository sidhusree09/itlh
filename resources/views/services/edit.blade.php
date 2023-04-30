@extends('layouts.app')

@section('content')
    <h1>Edit Service</h1>
    <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value={{ $service->id }}" />
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $service->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $service->price }}" required>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="{{ $service->location }}" required>
        </div>
        <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $service->category_id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
        </div>   
        <div class="form-group">
         <label for="image">Select an image:</label>
            <input type="file" id="image" name="image">             
            <img src="{{ asset('uploads/'.$service->image->path) }}" width="80" height="60" alt="{{$service->image->alt}}"/>
        </div>
        <div class="form-group">
            <label>Image Description</label>
            <input type="text" name="image_alt" class="form-control"  value="{{$service->image->alt}}" required>
        </div>   
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
