@extends('layout')
@section('title', 'Giỏ hàng')
@section('content')
<div ng-if="cart.length > 0" class="container mt-5">
    <!-- Cart List and Form -->
    <form method="post" action="">
        @csrf
        <div class="cart-list-head">
            <!-- Cart List Title -->
            <div class="cart-list-title">
                <div class="row text-center">
                    <!-- Columns Titles -->
                    <div class="col-lg-1 col-md-1 col-12"></div>
                    <div class="col-lg-4 col-md-3 col-12"><p>Tên sản phẩm</p></div>
                    <div class="col-lg-2 col-md-2 col-12"><p>Số lượng</p></div>
                    <div class="col-lg-2 col-md-2 col-12"><p>Giá</p></div>
                    <div class="col-lg-2 col-md-2 col-12"><p>Tổng tiền</p></div>
                    <div class="col-lg-1 col-md-2 col-12"><p>Hành động</p></div>
                </div>
            </div>
            <!-- Cart Single List -->
            <div ng-repeat="sp in cart" class="cart-single-list border-bottom py-3">
                <div class="row align-items-center text-center">
                    <div class="col-lg-1 col-md-1 col-12">
                        <img src="{{ asset('storage/uploads/') }}@{{ sp.image }}" class="img-fluid">
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <h5 class="product-name"><a href="/detail/@{{sp.id}}">@{{sp.title}}</a></h5>
                        <p class="product-des">
                            <span><em>Type:</em> Laser</span>
                            <span><em>Color:</em> White</span>
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <div class="form-group">
                            <input type="number" class="form-control" ng-model="sp.quantity" 
                            ng-change="updateQuantity(sp.id,sp.quantity)">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <del>@{{sp.sale | number}}đ</del>
                        <p>@{{sp.price | number}}đ</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>@{{sp.quantity * sp.price | number}}đ</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <a href="javascript:void(0)" ng-click="removeCart($index)"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Personal Information Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="container">
                                <h4 class="text-center">Thông tin cá nhân</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="fullname" class="form-label">Họ và tên</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ Auth::check() ? Auth::user()->username : '' }}" placeholder="Nhập họ và tên" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" placeholder="Nhập địa chỉ email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ Auth::check() ? Auth::user()->address : '' }}" placeholder="Nhập địa chỉ" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Số điện thoại</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::check() ? Auth::user()->phone : '' }}" placeholder="Nhập số điện thoại" required>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
                                            <label for="agree" class="form-check-label">Tôi đã đọc và đồng ý tất cả các điều khoản của shop</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Thành tiền<span>@{{ totalCart() | number }}đ</span></li>
                                </ul>
                                <div class="button mt-3">
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                    <a href="product-grids.html" class="btn btn-secondary">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div ng-if="cart.length == 0" class="d-flex justify-content-center align-items-center">
    <div class="text-center">
        <h1>Giỏ hàng trống</h1> <br>
        <a href="{{ route('home') }}" class="btn btn-secondary">Quay về trang chủ</a>
    </div>
</div>
@endsection
@section('viewFunction')
<script>
    viewFunction = function($scope, $http){
        $scope.updateQuantity = function(id, quantity){
            $http.patch('/api/cart/' + id, {
                quantity: quantity
            }).then(function(res){
                // $scope.$parent.cart = res.data.data;
            });
        }
    }
</script>
@endsection
