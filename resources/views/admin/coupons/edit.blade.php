<div class="modal fade" id="editCouponModal" tabindex="-1" aria-labelledby="editCouponLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if(isset($coupon))
            <form id="editCouponForm" action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editCouponLabel">
                        <i class="bi bi-pencil"></i>
                        Edit {{ $coupon->code }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control" id="edit_code" name="code" required value="{{ $coupon->code }}">
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="number" class="form-control" id="discount" step="any"  name="discount" required value="{{ $coupon->discount }}">
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="created_at" name="created_at" required value="{{ $coupon->created_at }}">
                    </div>
                    <div class="mb-3">
                        <label for="expiry_date" class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required value="{{ $coupon->expiry_date }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Coupon</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            @else
                <p>No coupons available to edit.</p>
            @endif
        </div>
    </div>
</div>