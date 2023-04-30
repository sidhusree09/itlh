@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile Information') }}                        
                            <a class="float-right" href="{{ route('profile.edit', ['id' => $user->id] ) }}">{{ __('Edit') }}</a>                         
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6"> 
                                <p>{{ $user->name }}</p> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>

                       <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('About') }}</label>

                            <div class="col-md-6">
                                <p>{{ $user->profile == null ? '' : $user->profile->bio }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                                <p><img src="{{ $user->profile == null ? asset('uploads/default.jpg') : asset('uploads/'.$user->profile->avatar) }}" width="250" height="200" /></p>
                            </div>
                        </div>                    

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <p>{{ $user->profile == null ? '' : $user->profile->phone_number }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <p>{{ $user->profile == null ? '' : $user->profile->location }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
