<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @if(isset($user))
            <form id="editUserForm" action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">
                        <i class="bi bi-pencil"></i>
                        Edit {{ $user->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="edit_role" class="form-select">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required value="{{ $user->email }}">
                    </div>
                    <div class="mb-3" id="edit_password">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control"  name="password" placeholder="Leave empty to keep current password"
                        autocomplete="new-password">
                    </div>
                    <div class="mb-3" id="edit_password_confirmation">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat your new password"
                        autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="edit_image" name="image"
                        accept=".jpeg, .jpg, .png, .gif" 
>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update User</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            @else
                <p>No users available to edit.</p>
            @endif
        </div>
    </div>
</div>