<table class="table table-striped table-hover usersTable">
    <thead>
      <tr class="table-dark">
        <th scope="col">#</th>
        <th scope="col">Customer</th>
        <th scope="col">Booking ID</th>
        <th scope="col">Room ID</th>
        <th scope="col">Coupon</th>
        <th scope="col">Check In</th>
        <th scope="col">Check Out</th>
        <th scope="col">Price</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if (count($bookings))
        @foreach ($bookings as $booking)
          <tr>
            <th scope="row">{{ ($bookings->currentPage() - 1) * $bookings->perPage() + $loop->iteration }}</th>
            <td>{{ $booking->user->name ?? 'No Customer Assigned' }}</td>
            <td>200025-{{ $booking->id }}</td>
            <td>{{ $booking->room_id }}</td>
            <td>{{ $booking->coupon->code ?? 'No coupon' }}</td>
            <td>{{ $booking->check_in }}</td>
            <td>{{ $booking->check_out }}</td>
            <td>{{ $booking->price }}</td>
            <td>{{ $booking->status }}</td>
            <td>
              <div class="dropdown">
                <button class="drop-border" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">            
                  <li>
                    <a class="dropdown-item edit-booking-link" href="#" data-id="{{ $booking->id }}" >
                    <i class="bi bi-pencil"></i>  
                    Edit
                  </a>
                  </li>
                  <li>
                    <button type="button" class="dropdown-item text-danger delete-action" 
                    data-id="{{ $booking->id }}" 
                    data-type="bookings">
                      <i class="bi bi-trash3"></i>
                      Delete
                    </button>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
        </div>
        @endforeach
      </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
      <div id="paginationLinks">
        {{ $bookings->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
    
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="deleteLabel">Confirm Deletion</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  Are you sure you want to delete this booking?
              </div>
              <div class="modal-footer">
                  <form id="deleteForm" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
    </div>        
    @else
    <tr>
      <td colspan="9" class="text-center py-2 ">No Booking Found</td>
    </tr>
  </tbody>
</table>
    
    @endif
    <div id="ajaxEditModalBooking"></div>               
    @include('admin.bookings.edit')