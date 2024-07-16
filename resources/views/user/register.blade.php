@extends('layout')
@section('title','Register')
@section('content')


<div class="account-login section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="card register-form">
                    <div class="card-body">
                        <div class="title text-center mb-4">
                            <h3>Chưa có tài khoản? Đăng ký</h3>
                            <p>Việc đăng ký chỉ mất chưa đầy một phút nhưng mang lại cho bạn toàn quyền kiểm soát các đơn đặt hàng của mình.</p>
                        </div>
                        <form action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="reg-ln" class="form-label">Họ tên </label>
                                    <input class="form-control" type="text" id="reg-ln" name="username" required>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="reg-email" class="form-label">E-mail</label>
                                    <input class="form-control" type="email" id="reg-email" name="email" required>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="reg-pass" class="form-label">Mật khẩu</label>
                                    <input class="form-control" type="password" id="reg-pass" name="password" required>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="reg-pass-confirm" class="form-label">Nhập lại mật khẩu</label>
                                    <input class="form-control" type="password" id="reg-pass-confirm" name="repassword" required>
                                </div>
                                @if (Session::has('message'))
                                    <div class="col-12 mb-3">
                                        <div class="alert alert-danger">
                                            {{ Session::get('message') }}
                                        </div>
                                        @php
                                            Session::forget('message')
                                        @endphp
                                    </div>
                                @endif
                                <div class="col-12 d-grid mb-3">
                                    <button class="btn btn-primary" type="submit">Đăng ký</button>
                                </div>
                                <div class="col-12 text-center">
                                    <p class="outer-link">Bạn đã có tài khoản ? <a href="{{ route('login') }}">Đăng nhập ngay</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
