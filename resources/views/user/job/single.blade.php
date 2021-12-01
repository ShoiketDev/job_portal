@extends('user.layouts.app')

@section('content')
    <div class="card" style="min-height: 72vh">
        <div class="card-header text-uppercase"><b>{{ __($data->job_title.' - Job Details') }}</b></div>
        <div class="card-body">
            <div class="card bordered shadow-sm">
                <div class="card-body">
                    <div class="mt-2 mb-3 text-center">
                        <img class="card-img-top " src="{{ asset($data->thumbnail) }}" alt="Thumbnail" style="width: 200px;">
                    </div>
                    <h5 class="card-title mt-5 text-primary font-weight-bold">{{ $data->job_title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-info">{{ $data->job_type }}</h6>
                    <p class="card-text">{{ $data->description }}</p>
                    <div class="text-center">
                        <a href="{{ url('user/job/apply/'.Auth::user()->access_token.'/'.$data->id) }}" class="btn btn-primary btn-sm mt-3">Apply</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
