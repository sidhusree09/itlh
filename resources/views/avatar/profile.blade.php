

<div class="row m-2">
    <div class="col-6 p-1">
        <img class="rounded-lg" src="{{ asset('uploads/profile_default.png')}}" width="30" height="30"/>
    </div>
    <div class="col-6 p-1">        
            <p class="m-0 fs-6 fw-bold avatarFont">{{ Auth::user()->name }}</p>
            <p class="m-0 fs-6 fw-bold avatarFont dropdown-toggle">{{ auth()->user()->profile->location }}</p>
    </div>
</div>