
<table class="table table-striped table-hover usersTable">
    <thead>
      <tr class="table-dark">
        <th scope="col">#</th>
        <th scope="col">Customer</th>
        <th scope="col">Hotel</th>
        <th scope="col">Rating</th>
        <th scope="col">Review</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if (count($reviews))
        @foreach ($reviews as $review)
          <tr
          @if ( $review->is_approved === 1 )
          class="table-success"
          @elseif ( $review->is_approved === 0 )
          class="table-danger"    
          @endif>
            <th scope="row">{{ ($reviews->currentPage() - 1) * $reviews->perPage() + $loop->iteration }}</th>
            <td>{{ $review->user->email ?? 'No Customer Assigned' }}</td>
            <td>{{ $review->hotel->name }}</td>
            <td class="text-center" style="color: rgb(227, 15, 61)">{{ $review->rating }}</td>
            <td>{{ $review->review }}</td>
            <td>
              @if($review->is_approved === 1)
                  <div class="d-flex align-items-center gap-0 text-success">
                      <small>Approved</small>
                  </div>
              @elseif($review->is_approved === 0)
                  <div class="d-flex align-items-center gap-0 text-danger">
                      <small>Rejected</small>
                  </div>
              @else
                  <div >
                      <small>Pending Approval</small>
                  </div>
              @endif
            </td>
            <td>
              
              @if ( $review->is_approved === null )
              
              <div class="review_actions d-flex justify-content-center align-items-center gap-2 my-2"> 
                <div>
                  <button type="button" class="dropdown-item text-success approve-action p-0"
                          title="Approve this review"
                          data-id="{{ $review->id }}"
                          data-info="approve"
                          data-type="reviews"
                          data-bs-toggle="modal"
                          data-bs-target="#actionModal">
                      <i class="bi bi-check-circle-fill fs-4"></i>
                  </button>
              </div>
              <div>
                  <button type="button" class="dropdown-item text-secondary reject-action p-0"
                          title="Reject this review"
                          data-id="{{ $review->id }}"
                          data-info="reject"
                          data-type="reviews"
                          data-bs-toggle="modal"
                          data-bs-target="#actionModal">
                      <i class="bi bi-x-circle-fill fs-4"></i>
                  </button>
              </div>
          
                
                @elseif ($review->is_approved === 1)

                <div class="review_actions d-flex justify-content-center align-items-center gap-4 my-2"> 
                  <div>
                    <button type="button" class="dropdown-item text-secondary reject-action p-0"
                            title="Reject this review"
                            data-id="{{ $review->id }}"
                            data-info="reject"
                            data-type="reviews"
                            data-bs-toggle="modal"
                            data-bs-target="#actionModal">
                        <i class="bi bi-x-circle-fill fs-4"></i>
                    </button>
                </div>
                @elseif ($review->is_approved === 0)    

                <div class="review_actions d-flex justify-content-center align-items-center gap-4 my-2"> 
                  <div>
                    <button type="button" class="dropdown-item text-success approve-action p-0"
                            title="Approve this review"
                            data-id="{{ $review->id }}"
                            data-info="approve"
                            data-type="reviews"
                            data-bs-toggle="modal"
                            data-bs-target="#actionModal">
                        <i class="bi bi-check-circle-fill fs-4"></i>
                    </button>
                </div>
                @endif
                <div>
                    <button type="button" class="dropdown-item text-danger delete-action p-0" 
                    title="Delete this review">
                    <i class="bi bi-trash-fill delete-action fs-4"
                    data-id="{{ $review->id }}" 
                    data-type="reviews"></i>
                    </button>
                </div>
              </div>
            </td>
          </tr>
        </div>
        @endforeach
      </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
      <div id="paginationLinks">
        {{ $reviews->links('vendor.pagination.bootstrap-4') }}
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
                  Are you sure you want to delete this review from the website?
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
      <td colspan="9" class="text-center py-2 ">No Reviews Found</td>
    </tr>
  </tbody>
</table>
    
    @endif         
    @include('admin.reviews.approve')