<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <form action="{{ route('admin.job.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ $data->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" required value="{{ $data->email }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" name="phone" id="phone" class="form-control" value="{{ $data->phone }}">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="1" @if ($data->role == 1) selected @endif>Admin</option>
                    <option value="{{ $data->role}}" @if ($data->role == 2) selected @endif>Candidate</option>
                </select>
            </div>
            <div class="form-group">
                <p for="status">Status</p>
                <label> <input type="radio" name="status" value="1" @if ($data->status == 1) checked @endif > Active</label>
                <label> <input type="radio" name="status" value="0" @if ($data->status == 0) checked @endif > Inactive</label>
            </div>
        </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-info text-white" data-dismiss="modal">Close</button>
    <button class="btn btn-primary" type="submit">Update</button>
    </div>
    </form>
</div>
