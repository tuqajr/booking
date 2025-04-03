<div class="modal fade" id="createBookingModal" tabindex="-1" aria-labelledby="createBookingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBookingModal">
                    <i class="bi bi-file-plus"></i>
                    Add New Booking
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
                <form action="{{ route('admin.bookings.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                      
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Customer</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            <option value="{{ old('user_id') }}" disabled selected>-- Select the customer --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Room#</label>
                        <select class="form-select" id="room_id" name="room_id" required>
                            <option value="{{ old('room_id') }}" disabled selected>-- Select the room# --</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id  }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                    {{ $room->id }}
                                </option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="coupon_id" class="form-label">Coupon</label>
                        <select class="form-select" id="coupon_id" name="coupon_id" >
                            <<option value="{{ old('coupon_id') }}" disabled selected>-- Select the coupon --</option>
                            @foreach ($coupons as $coupon)
                                <option value="{{ $coupon->id  }}" {{ old('coupon_id') == $coupon->id ? 'selected' : '' }}>
                                    {{ $coupon->code }}
                                </option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Check In</label>
                        <input type="date" step="any" class="form-control" id="check_in" name="check_in" required placeholder="Select the check-in date"
                        value="{{ old('check_in') }}"> 
                    </div>
                    <div class="mb-3">
                        <label for="check_out" class="form-label">Check Out</label>
                        <input type="date" step="any" class="form-control" id="check_out" name="check_out" required placeholder="Select the check_out date"
                        value="{{ old('check_out') }}"> 
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Total Price ($)</label>
                        <input  type="number" step="any" class="form-control" id="price" name="price" required
                        placeholder="Enter the booking value"
                        value=""></input>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Room Type</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="" disabled selected>-- Select the booking status --</option>
                                    <option value="cancelled" name="cancelled">
                                        Cancelled
                                    </option>
                                    <option value="pending" name="pending">
                                        pending
                                    </option>
                                    <option value="confirmed" name="confirmed">
                                        Confirmed
                                    </option>
                            </select>
                    </div>
                    <div class="d-flex gap-2 justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Create Booking</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>