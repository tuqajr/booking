<table class="table table-striped table-hover usersTable">
    <thead>
      <tr class="table-dark">
        <th scope="col">#</th>
        <th scope="col">Code</th>
        <th scope="col">Discount</th>
        <th scope="col">Start Date</th>
        <th scope="col">Expiry Date</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if (count($coupons))
        @foreach ($coupons as $coupon)
          <tr>
            <th scope="row">{{ ($coupons->currentPage() - 1) * $coupons->perPage() + $loop->iteration }}</th>
            <td>{{ $coupon->code }}</td>
            <td>{{ $coupon->discount }}</td>
            <td>{{ $coupon->created_at }}</td>
            <td>{{ $coupon->expiry_date }}</td>
            <td>
              <div class="dropdown">
                <button class="drop-border" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">             
                  <li>
                    <a class="dropdown-item edit-coupon-link" href="#" data-id="{{ $coupon->id }}" >
                    <i class="bi bi-pencil"></i>  
                    Edit
                  </a>
                  </li>
                  <li>
                    <button type="button" class="dropdown-item text-danger delete-action" 
                    data-id="{{ $coupon->id }}" 
                    data-type="coupons">
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
          {{ $coupons->links('vendor.pagination.bootstrap-4') }}
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
                  Are you sure you want to delete this coupon?
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
      <td colspan="9" class="text-center py-2 ">No Coupons Found</td>
    </tr>
  </tbody>
</table>
    @endif
    <div id="ajaxEditModalCoupon"></div>               
    @include('admin.coupons.edit')