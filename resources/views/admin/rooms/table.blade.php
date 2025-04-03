<table class="table table-striped table-hover usersTable">
    <thead>
      <tr class="table-dark">
        <th scope="col">#</th>
        <th scope="col">Hotel Name</th>
        <th scope="col">Room#</th>
        <th scope="col">description</th>
        <th scope="col">Room Type</th>
        <th scope="col">Capacity</th>
        <th scope="col">Price</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if (count($rooms))
        @foreach ($rooms as $room)
          <tr>
            <th scope="row">{{ ($rooms->currentPage() - 1) * $rooms->perPage() + $loop->iteration }}</th>
            <td>{{ $room->hotel->name }}</td>
            <td>{{ $room->id }}</td>
            <td>{{ $room->description }}</td>
            <td>{{ $room->room_type }}</td>
            <td>{{ $room->capacity }}</td>
            <td>${{ $room->price }}</td>
            <td>
              <div class="dropdown">
                <button class="drop-border" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">             
                  <li>
                  <a class="dropdown-item edit-room-link" href="#" data-id="{{ $room->id }}" >
                    <i class="bi bi-pencil"></i>  
                    Edit
                  </a>
                  </li>
                  <li>
                    <button type="button" class="dropdown-item text-danger delete-action" 
                    data-id="{{ $room->id }}" 
                    data-type="rooms">
                      <i class="bi bi-trash3"></i>
                      Delete
                    </button>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    <div class="d-flex justify-content-center">
      <div id="paginationLinks">
          {{ $rooms->links('vendor.pagination.bootstrap-4') }}
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
                Are you sure you want to delete the room?<br>
                <small style="color:red">
                  <i class="bi bi-exclamation-triangle"></i>
                  Removing the room will remove any pending bookings associated to it</small>
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
      <td colspan="9" class="text-center py-2 ">No Rooms Found</td>
    </tr>
  </tbody>
</table>
    @endif
    <div id="ajaxEditModalRoom"></div>               
    @include('admin.rooms.edit')