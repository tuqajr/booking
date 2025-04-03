<table class="table table-striped table-hover usersTable">
    <thead>
      <tr class="table-dark">
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">address</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if (count($hotels))
        @foreach ($hotels as $hotel)
          <tr>
            <th scope="row">{{ ($hotels->currentPage() - 1) * $hotels->perPage() + $loop->iteration }}</th>
            <td><img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->image }}" class="img-fluid" width="50px"></td>
            <td>{{ $hotel->name }}</td>
            <td>{{ $hotel->address }}</td>
            <td>{{ $hotel->description }}</td>
            <td>
              <div class="dropdown">
                <button class="drop-border" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href=" {{ route('admin.hotels.show', $hotel['id'], $hotel['name']) }}">
                    <i class="bi bi-eye"></i>
                    View Rooms</a></li>
                  <li>             
                  <li>
                    <a class="dropdown-item edit-hotel-link" href="#" data-id="{{ $hotel->id }}" >
                    <i class="bi bi-pencil"></i>  
                    Edit
                  </a>
                  </li>
                  <li>
                    <button type="button" class="dropdown-item text-danger delete-action" 
                    data-id="{{ $hotel->id }}" 
                    data-type="hotels">
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
          {{ $hotels->links('vendor.pagination.bootstrap-4') }}
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
                    Are you sure you want to delete this hotel?<br>
                    <small style="color:red">
                      <i class="bi bi-exclamation-triangle"></i>
                      Removing the hotel will remove any rooms associated to it
                    </small>
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
      <td colspan="9" class="text-center py-2 ">No Hotels Found</td>
    </tr>
  </tbody>
</table>
    @endif
    <div id="ajaxEditModalHotel"></div>               
    @include('admin.hotels.edit')