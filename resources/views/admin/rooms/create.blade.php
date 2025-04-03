<div class="modal fade" id="createRoomModal" tabindex="-1" aria-labelledby="createRoomModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRoomModal">
                    <i class="bi bi-123"></i>
                    Add New Room
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
                <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf

                      
                    <div class="mb-3">
                        <label for="hotel_id" class="form-label">Hotel</label>
                        <select class="form-select" id="hotel_id" name="hotel_id" required>
                            <option value="" disabled selected>-- Select a Hotel --</option>
                            @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}" {{ old('hotel_id') == $hotel->id ? 'selected' : '' }}>
                                    {{ $hotel->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea  class="form-control" id="description" name="description" required
                        placeholder="Enter the room's description">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                    <label for="room_type" class="form-label">Room Type</label>
                        <select class="form-control" id="room_type" name="room_type" required>
                            <option value="" disabled selected>-- Select The Room Type --</option> 
                                <option value="Single room" name="Single room">
                                    Single Room
                                </option>
                                <option value="Double room" name="Double room">
                                    Double Room
                                </option>
                                <option value="Twin room" name="Twin room">
                                    Twin Room
                                </option>
                                <option value="Suite" name="Suite">
                                    Suite
                                </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Capacity</label>
                        <input type="number" class="form-control" id="capacity" name="capacity" required
                        placeholder="Enter the room's capacity"></input>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" class="form-control" id="price" name="price" required
                        placeholder="Enter the price"></input>
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