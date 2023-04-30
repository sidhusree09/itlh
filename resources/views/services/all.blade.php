@extends('layouts.app')

@section('content')

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($services as $service)
        <div class="col">
            <div class="card">
                <img src="{{ asset('uploads/'.$service->image->path) }}" class="card-img-top" height="200" alt="{{ $service->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->title }}</h5>
                    <p class="card-text">{{ substr($service->description,0,300) }}...</p>
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary">View</a>
                        <a href="{{ route('login') }}" class="btn btn-success">Book</a>
                        <a href="{{ route('login') }}" class="btn btn-warning">Schedule</a>
                    @else                    
                        <a href="{{ route('services.show', $service) }}" class="btn btn-primary">View</a>
                        <button type="button" class="btn btn-primary book" data-bs-toggle="modal" data-bs-target="#bookingModal" data-id="{{ $service->id }}" >Book</button>                                                
                        <button type="button" class="btn btn-primary schedule" data-bs-toggle="modal" data-bs-target="#scheduleModal" data-id="{{ $service->id }}" >  Schedule</button>
                    @endguest
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">Book Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="bookingForm" action="" method="POST" style="display:inline">
        @csrf
        <input type="hidden" name="service_id" id="book_service_id" value="" />  
          <div class="alert alert-success d-none" id="b_success-message" role="alert"></div>
          <div class="alert alert-danger d-none" id="b_error-message" role="alert"></div>          
          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
          </div>
          <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" id="time" name="time" required>
          </div>
          <div class="mb-3">
            <label for="time" class="form-label">Message</label>
            <textarea name="message" cols="60" rows="5" class="form-control" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheduleModalLabel">Schedule Meeting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="scheduleForm" action="" method="POST" style="display:inline">
          @csrf
          <input type="hidden" name="service_id" id="schedule_service_id" value="" />
          <div class="alert alert-success d-none" id="s_success-message" role="alert"></div>
          <div class="alert alert-danger d-none" id="s_error-message" role="alert"></div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="title" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>         
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
        </div>        
      </div>
      <div class="modal-footer">        
        <button type="submit" class="btn btn-primary" id="scheduleSubmit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $(".book").on('click',function(){ 
        $("#book_service_id").val($(this).data("id"));
        $("#b_success-message").addClass('d-none');
        $("#b_error-message").addClass('d-none');
        $('#bookingForm').get(0).reset();
    });
    $(".schedule").on('click',function(){
        $("#schedule_service_id").val($(this).data("id"));
        $("#s_success-message").addClass('d-none');
        $("#s_error-message").addClass('d-none');
        $('#scheduleForm').get(0).reset();
    });
     $('#bookingForm').submit(function(event) {           
            // Stop form from submitting normally
            event.preventDefault();

            // Get form data
            var formData = $(this).serialize();

            // Send the data using post with Ajax
            $.ajax({
                url: '{{ route('bookings.ajaxStore') }}',
                type: 'post',
                data: formData,
                success: function(response) {
                    // Handle success response
                    $("#b_success-message").text(response.message).removeClass('d-none');
                    setTimeout(function() {
                      $("#bookingModal").modal('hide');
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    $("#b_error-message").text('Booking Cancel Failed').removeClass('d-none');
                    setTimeout(function() {
                      $("#bookingModal").modal('hide');
                    }, 2000);
                }
            });
        });
        
         $('#scheduleForm').submit(function(event) {            
            // Stop form from submitting normally
            event.preventDefault();

            // Get form data
            var formData = $(this).serialize();

            // Send the data using post with Ajax
            $.ajax({
                url: '{{ route('schedule.ajaxStore') }}',
                type: 'post',
                data: formData,
                success: function(response) {
                    // Handle success response
                    $("#s_success-message").text(response.message).removeClass('d-none');
                    setTimeout(function() {
                      $("#scheduleModal").modal('hide');
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    $("#s_error-message").text('Booking Cancel Failed').removeClass('d-none');
                    setTimeout(function() {
                      $("#scheduleModal").modal('hide');
                    }, 2000);
                }
            });
        });
});
</script>

@endsection