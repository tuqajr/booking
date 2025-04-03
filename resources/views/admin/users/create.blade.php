<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModal">
                    <i class="bi bi-person-plus"></i>
                        Add New User</h5>
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
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf

                      
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Name</label>
                        <input type="text" step="any" class="form-control" id="user_name" name="name" required placeholder="Enter User Name" pattern="[a-zA-Z\s]+" 
                        title="Only letters are allowed."
                        value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email Address</label>
                        <input  type="email" class="form-control" id="user_email" name="email" required
                        placeholder="Enter User Email"
                        value="{{ old('email') }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required
                        placeholder="Enter User Password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required
                        placeholder="Confirm User Password">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Picture</label>
                        <input 
                          type="file" 
                          class="form-control" 
                          id="image" 
                          name="image" 
                          accept=".jpeg,.jpg,.png,.gif" 
                        >
                      </div>                      
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>>
                        </select>
                    </div>
                    <div class="d-flex gap-2 justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Create User</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>