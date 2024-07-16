@extends('layout-admin')
@section('title', 'Dashboard')
@section('content-admin')

<main class="content px-3 py-2">
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <ul class="navbar-nav ms-auto">
                    @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>

        <!-- Dashboard Header -->
        <div class="mb-3">
            <h4>Admin Dashboard</h4>
        </div>

        <!-- Dashboard Content -->
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card flex-fill border-0 illustration">
                    <div class="card-body p-3">
                        <h4>Số đơn hàng</h4>
                        <p class="mb-2">Total</p>
                    <h4 class="mb-2">{{$soDonHang}} VND</h4>
                    </div>
                </div>
            </div>

            <!-- Total Card -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card flex-fill border-0">
                    <div class="card-body p-3">
                        <h4>Số sản phẩm </h4>
                        <p class="mb-2">Total</p>
                        <h4 class="mb-2">{{$soSanPham}}</h4>
                        <!-- Uncomment if needed
                        <div class="mb-0">
                            <span class="badge text-success me-2">+9.0%</span>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card flex-fill border-0 illustration">
                    <div class="card-body p-3">
                        <h4>Khách hàng </h4>
                        <p class="mb-2">Total</p>
                        <h4 class="mb-2">{{$soKhachHang}}</h4>
                    </div>
                </div>
            </div>

            <!-- Total Card -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card flex-fill border-0">
                    <div class="card-body p-3">
                        <h4>Doanh Thu </h4>
                        <p class="mb-2">Total</p>
                        <h4 class="mb-2">{{$doanhThu}}</h4>
                        <!-- Uncomment if needed
                        <div class="mb-0">
                            <span class="badge text-success me-2">+9.0%</span>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Content or Table -->
        <!-- You can add more content here -->
    </div>
</main>
@endsection
