@extends('layout')
@section('title')
    {{ $product->title }}
@endsection

@section('content')
    <!-- Start Item Details -->
    <section class="item-details section py-5">
        <div class="container">
            <div class="top-area mb-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12 mb-4 mb-lg-0">
                        <div class="product-images">
                            <div id="gallery" class="text-center">
                                <img src="{{ asset('storage/uploads/' . $product->image) }}" class="img-fluid mb-3"
                                    height="300" alt="{{ $product->title }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->title }}</h2>
                            <h3 class="price">{{ number_format($product->price) }} VND</h3>
                            <p><strike>{{ $product->sale }} VND</strike></p>
                            <h4 class="mt-4">Mô tả</h4>
                            <p class="info-text">{{ $product->description }}</p>
                            <div class="row mt-4">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="quantity">Số lượng</label>
                                        <input type="number" class="form-control" value="1" min="1"
                                           max="20" id="quantity" ng-model="quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-4 col-md-4 col-12 mb-3">
                                    <button class="btn btn-primary btn-block"
                                        ng-click="addToCart({{ $product->id }}, quantity)">Thêm giỏ hàng</button>
                                </div> 
                                @auth
                                    <div class="col-lg-4 col-md-4 col-12 mb-3">
                                    
                                        <button class="btn btn-secondary btn-block" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Thêm bình luận</button>

                                    </div>
                                @endauth
                                @guest
                                    <div class="alert alert-info"></div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-details-info mb-5">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                            <div class="info-body">
                                <h4>Chi tiết sản phẩm</h4>
                                <p>{{ $product->detail }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Danh sách bình luận -->
            <div class="col-lg-8 col-12">
                <div class="single-block">
                    <div class="reviews">
                        <h4 class="title">Latest Reviews</h4>

                        <div ng-repeat="bl in dsbl" class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="assets/images/blog/comment1.jpg" class="img-fluid rounded-start"
                                        alt="#">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">@{{ bl.user_fullname }}</h5>
                                        <p class="card-text">@{{ bl.created_at | date: 'dd/MM/yyyy HH:mm:ss' }}</p>
                                        <div class="star-rating">
                                            <ul class="list-inline mb-0">
                                                <li ng-show="bl.rating>=1" class="list-inline-item"><i
                                                        class="lni lni-star-filled"></i></li>
                                                <li ng-show="bl.rating>=2" class="list-inline-item"><i
                                                        class="lni lni-star-filled"></i></li>
                                                <li ng-show="bl.rating>=3" class="list-inline-item"><i
                                                        class="lni lni-star-filled"></i></li>
                                                <li ng-show="bl.rating>=4" class="list-inline-item"><i
                                                        class="lni lni-star-filled"></i></li>
                                                <li ng-show="bl.rating==5" class="list-inline-item"><i
                                                        class="lni lni-star-filled"></i></li>

                                                <li ng-show="bl.rating<5" class="list-inline-item"><i
                                                        class="lni lni-star"></i></li>
                                                <li ng-show="bl.rating<4" class="list-inline-item"><i
                                                        class="lni lni-star"></i></li>
                                                <li ng-show="bl.rating<3" class="list-inline-item"><i
                                                        class="lni lni-star"></i></li>
                                                <li ng-show="bl.rating<2" class="list-inline-item"><i
                                                        class="lni lni-star"></i></li>
                                                <li ng-show="bl.rating<1" class="list-inline-item"><i
                                                        class="lni lni-star"></i></li>
                                            </ul>
                                        </div>
                                        <p class="card-text"><small class="text-muted">@{{ bl.content }}</small></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Review Modal -->
                <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nhận xét</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="review-rating" class="form-label">Đánh giá</label>
                                            <select ng-model="rating" class="form-select" id="review-rating">
                                                <option value="5">5 Stars</option>
                                                <option value="4">4 Stars</option>
                                                <option value="3">3 Stars</option>
                                                <option value="2">2 Stars</option>
                                                <option value="1">1 Star</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="review-message" class="form-label">Bình luận</label>
                                    <textarea  class="form-control" ng-model="content" rows="8"  required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" ng-click="sendComment()">Thêm bình
                                    luận</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>
@endsection
@section('viewFunction')
    <script>
        
         viewFunction = function($scope, $http) {
           $scope.quantity = 1;
            $scope.dsbl = [];
            $scope.getComment = function() {
                $http.get('/api/comments/product/{{ $product->id }}').then(
                    function(res) {
                        $scope.dsbl = res.data.data;
                        console.log($scope.dsbl);
                    },
                    function(res) {

                    }
                );
             
            }
            $scope.getComment();
            $scope.sendComment = function() {
                $http.post('/api/comments', {
                    'product_id': {{ $product->id }},
                    'content': $scope.content,
                    'rating': $scope.rating,
                }).then(
                    function(res) {
                        document.querySelector('.btn-close').click();
                        $scope.content = '';
                        $scope.rating = '5';
                        $scope.getComment();
                    }
                )
            }
         

        };
    </script>
@endsection
