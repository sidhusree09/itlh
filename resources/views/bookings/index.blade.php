@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bookings</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">New Booking</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Service Name</th>                
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->service->title  }}</td>              
                <td>{{ $booking->date }}</td>
                <td>{{ $booking->time }}</td>
                <td>@php echo $booking->status == 1 ? '<div class="alert alert-success p-1">Active</div>'  :  '<div class="alert alert-danger p-1">Canceled</div>' @endphp </td>
                <td>
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                        <button type="button" {{ $booking->status ==0 ? 'disabled' : ''}} class="btn btn-sm btn-primary bookingCancel" data-bs-toggle="modal" data-bs-target="#cancelModal" data-id="{{ $booking->id }}">
                          Cancel
                        </button>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- model -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Reasons</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="alert alert-success d-none" id="success-message" role="alert">
          
        </div>
      <div class="alert alert-danger d-none" id="error-message" role="alert">
          
        </div>        
      <form action="{{ route('bookings.cancel') }}" method="POST" style="display:inline" id="myForm">
        @csrf
        <input type="hidden" name="id" value="0" id="cancel-id"/>
          <div class="modal-body">
            <textarea name="remarks" cols="45" rows="5" id="remarks" required></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
        // Attach a submit handler to the form
        $(".bookingCancel").on('click',function(){             
            $("#cancel-id").val($(this).data('id'));
            $("#remarks").val('');
            $("#success-message").addClass('d-none');
            $("#error-message").addClass('d-none');
        });
  
        $('#myForm').submit(function(event) {
            
            // Stop form from submitting normally
            event.preventDefault();

            // Get form data
            var formData = $(this).serialize();

            // Send the data using post with Ajax
            $.ajax({
                url: '{{ route('bookings.cancel') }}',
                type: 'post',
                data: formData,
                success: function(response) {
                    // Handle success response
                    $("#success-message").text(response.message).removeClass('d-none');
                    setTimeout(function() {
                      $("#cancelModal").modal('hide');
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    $("#error-message").text('Booking Canceled Failed').removeClass('d-none');
                    setTimeout(function() {
                      $("#cancelModal").modal('hide');
                    }, 2000);
                }
            });
        });
        
  // Listen for clicks on the View Item button
  $('.btn-view-item').click(function() {
    // Get the ID of the item from the data attribute
    var itemId = $(this).data('item-id');

  });
});
</script>

@endsection
