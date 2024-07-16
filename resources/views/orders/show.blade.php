@extends('layout-admin')
@section('title', 'Chi tiết đơn hàng')
@section('content-admin')

<nav class="navbar navbar-expand-lg navbar-light">
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

<div class="container mt-4">
    <h1 class="mb-4">Chi tiết đơn hàng #{{ $order->id }}</h1>
    <div class="card">
        <div class="card-header">
            Thông tin khách hàng
        </div>
        <div class="card-body">
            <p><strong>Tên:</strong> {{ $order->user_fullname }}</p>
            <p><strong>Email:</strong> {{ $order->user_email }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->user_phone }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->user_address }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Chi tiết đơn hàng
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->product->title }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($detail->quantity * $detail->price, 0, ',', '.') }} VND</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Tổng kết
        </div>
        <div class="card-body">
            <p><strong>Tổng số lượng:</strong> {{ $order->total_quantity }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total_money, 0, ',', '.') }} VND</p>
        </div>
    </div>
</div>

@endsection
