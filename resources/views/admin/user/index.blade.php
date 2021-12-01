@extends('admin.layouts.app')

@section('content')
    <div class="card" style="min-height: 72vh">
        <div class="card-header"><b>{{ __('Jobs') }}</b></div>

        <div class="card-body">
            <div class="text-right m-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Post a Job</button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" class="display">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Models\User::get() as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    @if ($item->role == 1)
                                        <span class="badge badge-success">Admin</span>
                                    @else
                                        <span class="badge badge-primary">Candidate</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-info">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary userViewBtn" data-id="{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                    <button type="button" class="btn btn-danger userDelete" data-id="{{ $item->id }}">X</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content" id="content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Post a job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('admin.job') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" id="company" name="company" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="description" id="desc" cols="9" rows="3" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jobType">Job Type</label>
                            <select name="job_type" id="jobType" class="form-control" required>
                                <option value="" disabled>Select a job type</option>
                                @foreach (App\Models\JobType::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <p for="status">Status</p>
                            <label> <input type="radio" name="status" value="1"> Active</label>
                            <label> <input type="radio" name="status" value="0"> Inactive</label>
                        </div>
                    </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-info text-white" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Post</button>
                </div>
                </form>
            </div>
            </div>
        </div>
@endsection

@section('script')

        <script>
            $(document).ready(function(){
                jQuery.noConflict();
                $('.userViewBtn').click(function(){
                    var id = $(this).attr('data-id');
                    $.post("{{ route('admin.user.show') }}", {_token: '{{ csrf_token() }}', id:id},
                   function(data) {
                       console.log(data);
                        $('#content').html(data);
                        $('#exampleModal').modal('show');
                    });
                });

                $('.userDelete').click(function(){
                    var id = $(this).attr('data-id');
                    $.post("{{ route('admin.user.delete') }}", {_token: '{{ csrf_token() }}', id:id},
                   function($data) {
                        location.reload();
                    });
                });
            });
        </script>

@endsection
