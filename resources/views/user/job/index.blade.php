@extends('user.layouts.app')

@section('content')
    <div class="card" style="min-height: 72vh">
        <div class="card-header text-uppercase"><b>{{ __('Available Jobs') }}</b></div>
        <div class="card-body">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card bordered shadow-sm">
                            <div class="card-body text-center">
                                <div class="mt-2 mb-3" style="min-height: 30px;max-height: 30px;">
                                    <img class="card-img-top " src="{{ asset($item['thumbnail']) }}" alt="Thumbnail" style="width: 150px;">
                                </div>
                                <h5 class="card-title font-weight-bold text-primary">{{ $item['job_title'] }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $item['job_type'] }}</h6>
                                <a href="{{ url('user/job/details/'.$item['id']) }}" class="btn btn-primary btn-sm mt-3">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                $('.jobEditBtn').click(function(){
                    var id = $(this).attr('data-id');
                    $.post("{{ route('admin.job.edit') }}", {_token: '{{ csrf_token() }}', id:id},
                   function(data) {
                        console.log(data);
                        $('#content').html(data);
                        $('#exampleModal').modal('show');
                    });
                });

                $('.jobDelete').click(function(){
                    var id = $(this).attr('data-id');
                    $.post("{{ route('admin.job.delete') }}", {_token: '{{ csrf_token() }}', id:id},
                   function($data) {
                        location.reload();
                    });
                });
            });
        </script>

@endsection
