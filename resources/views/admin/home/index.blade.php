@extends('admin.layouts.app')

@section('content')
    <div class="card" style="min-height: 72vh">
        <div class="card-header"><b>{{ __('Admin Dashboard') }}</b></div>

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
                        <h3>{{ App\Models\User::get()->count() }}</h3>

                        <p class="text-uppercase">Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-success text-white">
                    <div class="inner">
                        <h3>{{ App\Models\User::where('status',1)->get()->count() }}</h3>
                        <p class="text-uppercase">Active Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-red text-white">
                    <div class="inner">
                        <h3>{{ App\Models\User::where('status',0)->get()->count() }}</h3>
                        <p class="text-uppercase">Inactive Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users-slash"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-aqua text-white">
                    <div class="inner">
                        <h3>{{ App\Models\Job::get()->count() }}</h3>

                        <p class="text-uppercase">Total Jobs</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-success text-white">
                    <div class="inner">
                        <h3>{{ App\Models\Job::where('status',1)->get()->count() }}</h3>
                        <p class="text-white text-uppercase">Active Jobs</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-area"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ App\Models\Job::where('status',0)->get()->count() }}</h3>
                        <p class="text-uppercase">Inactive Jobs</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
