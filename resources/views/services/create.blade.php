@extends('layouts.app')

@section('content')
    <h1>Add Service</h1>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        </div>   
        <div class="form-group">
         <label for="image">Select an image:</label>
            <input type="file" id="image" name="image">
        </div>
        <div class="form-group">
            <label>Image Description</label>
            <input type="text" name="image_alt" class="form-control" required>
        </div>         
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
