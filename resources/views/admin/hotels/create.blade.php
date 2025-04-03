<div class="modal fade" id="createHotelModal" tabindex="-1" aria-labelledby="createHotelModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createHotelModal">
                    <i class="bi bi-building-add"></i>
                    Add New Hotel
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf

                      
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" step="any" class="form-control" id="name" name="name" required placeholder="Enter the hotel name" 
                        value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">address</label>
                        <input  type="text" class="form-control" id="address" name="address" required
                        placeholder="Enter the hotel address"
                        value="{{ old('address') }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required
                        placeholder="Enter the description">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hotel Picture</label>
                        <input 
                          type="file" 
                          class="form-control" 
                          id="image" 
                          name="image" 
                          accept=".jpeg,.jpg,.png" 
                        >
                    </div>
                    <div class="d-flex gap-2 justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Create Hotel</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>