@extends('layout-admin')
@section('title', 'Danh sách đơn hàng')
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
    <h1 class="mb-4">Danh sách đơn hàng</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Số lượng</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_fullname }}</td>
                <td>{{ $order->user_email }}</td>
                <td>{{ $order->user_phone }}</td>
                <td>{{ $order->user_address }}</td>
                <td>{{ number_format($order->total_money, 0, ',', '.') }} VND</td>
                <td>{{ $order->total_quantity }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Xem</a>
                    {{-- <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Sửa</a> --}}
                    {{-- <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
