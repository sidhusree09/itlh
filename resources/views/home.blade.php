@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="dashboardText">Karma yoga, you have <a href="#">3 activites</a> live on Switch</p>
                    <p class="dashboardText">You have had <a href="">6,524 people</a> look at your activities this month</p>
                    <p class="dashboardText">You managed to turn that in to <a href="">52 bookings</a></p>
                    
                    <div class="hr"></div>
                    <div class="row ms-auto">
                        <div class="col-5 col-md-5 col-sm-12 dashboadContainer rounded-3 p-4 m-1">
                            
                            <p class="font-weight-bold small"><b> Revenue for {{ $monthName }}</b> 
                                <span class="fa fa-arrow-right text-right" style="float:right"></span></p>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="currency-small"></div> <b>{{ $totalBookingValue }}</b> <span class="small">AED</span>
                                        <p class="statusFont">Total This Month</p>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="switch-icon"></div> <b>4,100</b> <span class="small">AED</span>
                                    <p class="statusFont m-0">From Switch Members</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="bookings"></div> <b>{{ $bookingsCount }}</b> <span class="small">AED</span>
                                    <p class="statusFont m-0">Bookings this month</p>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="views"></div> <b>{{ $totalViews }}</b> 
                                    <p class="statusFont m-0">Views This month</p>
                                </div>
                            </div>    
                            
                        </div>
                        <div class="col-5 col-md-5 col-sm-12 dashboadContainer rounded-lg p-4 m-1">
                            <small><b>Switch Credit</b><span class="fa fa-arrow-right text-right" style="float:right"></span></small>
                            <div class="row">
                            <div class="col-md-6 col-sm-12 p-4">                                
                                <h4><div class="currency"></div>70,549 <span class="small">AED</span> </h4></div>
                            <div class="col-md-6 col-sm-12"><b>of switch credits available this month for activities like yours</b></div>
                            </div>
                        </div>
                    
                        <div class="col-5 col-md-5 col-sm-12 dashboadContainer rounded-lg p-4 m-1">
                            <small><b>Top Performers</b><span class="fa fa-arrow-right text-right" style="float:right"></span></small>
                            <!-- user badge -->
                            <div class="row">
                            <div class="col-6 m-0 p-0">
                                @include('avatar.static')
                            </div>
                            <div class="col-3 m-0 p-1">
                                <b> <i class="fa-solid fa-ticket"></i> {{ $bookingsCount }} Bookings</b>
                            </div>
                            <div class="col-3 m-0 p-0">                                                                    
                                <b> <div class="currency-small"></div> {{$averageBookingsValue}} AED </b><br/><small>Average value of each booking</small>
                            </div>
                            </div>
                        </div>
                        <div class="col-5 col-md-5 col-sm-12 dashboadContainer rounded-lg p-4 m-1">
                            <small><span class="fa fa-arrow-right text-right" style="float:right"></span>
                                <b>Comparision for {{ $monthName }}</b></span></small>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <img src="{{ asset('uploads/interview-stat.png') }}" width="100%" height="100%"/>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <i class="fas fa-eye fa-lg"></i> 90 <br/><small>Views</small>
                                    <br/>
                                    <i class="fa-solid fa-ticket"></i> 18 <br/><small>Bookings</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
