<div class="modal fade" id="createCouponModal" tabindex="-1" aria-labelledby="createCouponModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCouponModal">
                    <i class="bi bi-percent"></i>
                    Add New Coupon
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
                <form action="{{ route('admin.coupons.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf

                      
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" step="any" class="form-control" id="code" name="code" required placeholder="Enter the discount code" 
                        value="{{ old('code') }}">
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input  type="number" class="form-control" id="discount" step="any" name="discount" required
                        placeholder="Enter the discount amount"
                        value="{{ old('discount') }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="expiry_date" class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required
                        placeholder="Enter the expiry date">
                    </div>
                    <div class="d-flex gap-2 justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Create Code</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>