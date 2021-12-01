<aside class="mt-1 mb-1" style="min-height: 70vh;">
    <div class="sidebar p-3 bg-white">
        <div class="brandmerchant mt-2 text-center wow fadeInLeft">
        <h4>{{ Auth::user()->name }}</h4>
        <strong class="text-success">Online</strong>
        </div>
        <hr>
        <a href="{{ route('home') }}" class="sidebar_link text-decoration-none align-items-center rounded">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="{{ route('user.job') }}" class="sidebar_link text-decoration-none align-items-center rounded">
            <i class="fas fa-arrow-circle-right"></i> Available Jobs
        </a>
    </div>
</aside>
