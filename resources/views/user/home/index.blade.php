@extends('user.layouts.app')

@section('content')
    <div class="card" style="min-height: 72vh">
        <div class="card-header"><b>{{ __('Candidate Dashboard') }}</b></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Box --}}
            <div class="row mb-4">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ App\Models\Job::where('status', 1)->get()->count() }}</h3>

                        <p class="text-uppercase">Available Jobs</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-theater-masks"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-success text-white">
                    <div class="inner">
                        <h3>{{ App\Models\User::where('status',1)->get()->count() }}</h3>
                        <p class="text-uppercase">Applied Jobs</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-check-circle"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-info text-white">
                    <div class="inner">
                        <h3>{{ App\Models\User::where('status',0)->get()->count() }}</h3>
                        <p class="text-uppercase">Assessment</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-font"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
