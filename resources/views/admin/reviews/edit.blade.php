<div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if(isset($booking))
            <form id="editBookingForm" action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookingLabel">
                        <i class="bi bi-pencil"></i>
                        Edit Booking #200025-{{ $booking->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Customer</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            <option value="{{ $booking->user_id ?? '' }}" selected >{{ $booking->user->name ?? 'No Customer Assigned'}}</option>
                            @foreach ($users as $user)
                                @if ($user->id != $booking->user_id)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Room#</label>
                        <select class="form-select" id="room_id" name="room_id" required>
                            <option value="{{ $booking->room_id }}" selected >{{ $booking->room_id }}</option>
                            @foreach ($rooms as $room)
                                @if ($room->id != $booking->room_id)
                                <option value="{{ $room->id  }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                    {{ $room->id }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="coupon_id" class="form-label">Coupon</label>
                        <select class="form-select" id="coupon_id" name="coupon_id" required>
                            <option value="{{ $booking->coupon_id ?? '' }}" selected >{{ $booking->coupon->code ?? 'No coupon' }}</option>
                            @foreach ($coupons as $coupon)
                                @if ($coupon->id != $booking->coupon_id)
                                <option value="{{ $coupon->id  }}" {{ old('coupon_id') == $coupon->id ? 'selected' : '' }}>
                                    {{ $coupon->code }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Check In</label>
                        <input type="date" step="any" class="form-control" id="check_in" name="check_in" required placeholder="Select the check-in date"
                        value="{{ $booking->check_in }}"> 
                    </div>
                    <div class="mb-3">
                        <label for="check_out" class="form-label">Check Out</label>
                        <input type="date" step="any" class="form-control" id="check_out" name="check_out" required placeholder="Select the check_out date"
                        value="{{ $booking->check_out }}"> 
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Total Price ($)</label>
                        <input  type="number" step="any" class="form-control" id="price" name="price" required
                        placeholder="Enter the booking value"
                        value="{{ $booking->price }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Room Type</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="{{ $booking->status }}">The booking status is {{ $booking->status }}</option> 
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Booking</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            @else
                <p>No Bookings available to edit.</p>
            @endif
        </div>
    </div>
</div>