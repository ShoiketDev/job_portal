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
            <div class="form-group text-center">
                @if ($data->thumbnail)
                    <img src="{{ asset($data->thumbnail) }}" alt="Thambnail" style="width: 200px;" class="rounded">
                @else
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                @endif
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required value="{{ $data->title }}">
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" id="company" name="company" class="form-control" required value="{{ $data->company }}">
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea name="description" id="desc" cols="9" rows="3" class="form-control" required>{{ $data->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="jobType">Job Type</label>
                <select name="job_type" id="jobType" class="form-control" required>
                    @if ($data->job_types_id)
                        <option value="{{ $data->job_types_id }}">{{ $data->job->title }}</option>
                    @endif
                    <option value="" disabled>Select a job type</option>
                    @foreach (App\Models\JobType::all() as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
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
