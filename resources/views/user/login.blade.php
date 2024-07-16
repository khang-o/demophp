@extends('layout')
@section('title','Login')
@section('content')

<div class="account-login section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <form action="" class="card login-form" method="post">
                    <div class="card-body">
                        <div class="title text-center mb-4">
                            @csrf
                            <h3>Đăng nhập </h3>
                            <p>Bạn có thể đăng nhập bằng tài khoản mạng xã hội hoặc địa chỉ email của mình.</p>
                        </div>
                        <div class="social-login mb-4">
                            <div class="row g-2">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <a class="btn btn-primary w-100" href="javascript:void(0)">
                                        <i class="lni lni-facebook-filled"></i> Facebook 
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <a class="btn btn-info w-100" href="javascript:void(0)">
                                        <i class="lni lni-twitter-original"></i> Twitter 
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <a class="btn btn-danger w-100" href="javascript:void(0)">
                                        <i class="lni lni-google"></i> Google 
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="alt-option text-center mb-4">
                            <span>Or</span>
                        </div>
                        <div class="mb-3">
                            <label for="reg-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="reg-email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="reg-pass" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="reg-pass" name="password" required>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                                <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
                            </div>
                            <a class="lost-pass" href="{{route('get_password')}}">Quên mật khẩu?</a>
                        </div>
                        @if (Session::has('message'))
                        <div class="alert alert-danger">
                            {{ Session::get('message') }}
                        </div>
                        @php
                            Session::forget('message')
                        @endphp
                        @endif
                        <div class="d-grid mb-3">
                            <button class="btn btn-primary" type="submit">Đăng nhập</button>
                        </div>
                        <p class="text-center">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
