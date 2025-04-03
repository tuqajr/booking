<div class="modal fade" id="editHotelModal" tabindex="-1" aria-labelledby="editHotelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if(isset($hotel))
            <form id="editHotelForm" action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editHotelLabel">
                        <i class="bi bi-pencil"></i>
                        Edit "{{ $hotel->name }}"</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" step="any" class="form-control" id="name" name="name" required placeholder="Enter the hotel name" 
                        value="{{ $hotel->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">address</label>
                        <input  type="text" class="form-control" id="address" name="address" required
                        placeholder="Enter the hotel address"
                        value="{{ $hotel->address }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required
                        placeholder="Enter the description">{{ $hotel->description }}</textarea>
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Hotel</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            @else
                <p>No Hotels available to edit.</p>
            @endif
        </div>
    </div>
</div>