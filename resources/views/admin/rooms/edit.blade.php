<div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="editRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if(isset($room))
            <form id="editRoomForm" action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoomLabel">
                        <i class="bi bi-pencil"></i>
                        Edit Room #{{ $room->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="hotel_id" class="form-label">Hotel</label>
                        <select class="form-select" id="hotel_id" name="hotel_id" required>
                            <option value="{{ $room->hotel_id }}" selected >{{ $room->hotel->name }}</option>
                            @foreach ($hotels as $hotel)
                                @if ($hotel->id != $room->hotel_id)
                                <option value="{{ $hotel->id }}" {{ old('hotel_id') == $hotel->id ? 'selected' : '' }}>
                                    {{ $hotel->name }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                    </div>                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea  class="form-control" id="description" name="description" required
                        placeholder="Enter the room's description">{{ $room->description }}</textarea>
                    </div>
                    <div class="mb-3">
                    <label for="room_type" class="form-label">Room Type</label>
                        <select class="form-select" id="room_type" name="room_type" required>
                            <option value="{{ $room->room_type }}">This room type is {{ $room->room_type }}</option> 
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
                        value="{{ $room->capacity }}"
                        placeholder="Enter the room's capacity"></input>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="f" class="form-control" id="price" name="price" step=any
                        value="{{ $room->price }}"
                        required
                        placeholder="Enter the price"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Room</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            @else
                <p>No Rooms available to edit.</p>
            @endif
        </div>
    </div>
</div>