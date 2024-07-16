@extends('layout')
@section('title','Home')
@section('content')

<body>
  
    <div class="container mt-4">
        <!-- Popular Products Section -->
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Sản phẩm phổ biến</h2>
                    <p></p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($dssp as $item)
            <div class="col-lg-3 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ route('products.detail', ['id' => $item->id]) }}">
                        <img src="{{ asset('storage/uploads/' . $item->image) }}" class="card-img-top" height="250" alt="{{ $item->title }}">
                    </a>
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ $item->title }}</h6>
                        <p class="card-text"><strong>Giá: </strong>{{ number_format($item->price) }} VND</p>
                        <p class="card-text">Giảm giá: <strike>{{ number_format($item->sale) }}</strike> VND</p>
                        <a class="btn btn-primary" href="javascript:void(0)" ng-click="addToCart({{$item->id}},1)">Thêm giỏ hàng</a>

                        <div class="container mt-3">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="star-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($item->rating))
                                                <i class="lni lni-star-filled" style="color: #ffcc00;"></i>
                                            @elseif ($i == ceil($item->rating))
                                                <i class="lni lni-star-half" style="color: #ffcc00;"></i>
                                            @else
                                                <i class="lni lni-star" style="color: #ffcc00;"></i>
                                            @endif
                                        @endfor
                                        <span>{{ number_format($item->rating, 1) }} Review(s)</span>
                                    </div>
                                    <p class="mt-2">Rating: <span id="rating-value-{{ $item->id }}">{{ number_format($item->rating, 1) }}</span>/5</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <script>
            $(document).ready(function() {
                // Your JavaScript to handle real-time rating updates can go here
            });
        </script>

        <!-- New Arrival Section -->
        <div class="container mt-5">
            <h2 class="text-center mb-5"><strong>Mới nổi</strong></h2>
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card text-bg-dark border-0 rounded-0">
                        <img src="https://via.placeholder.com/800x400?text=Random+Cake+Image+1" class="card-img object-fit-cover rounded-0 w-100" style="height: 400px;">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center bg-dark bg-opacity-25">
                            <div class="text-center">
                                <!-- Uncomment to add text
                                <p class="card-text fs-6">Saigon River</p>
                                <h1 class="card-title display-3 fw-bolder"> Sông Sài Gòn</h1> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-dark border-0 rounded-0 mb-4">
                        <img src="https://via.placeholder.com/400x200?text=Random+Cake+Image+2" class="card-img rounded-0 w-100" style="height: 200px;">
                        <div class="card-img-overlay d-flex justify-content-center align-items-start bg-dark bg-opacity-25">
                            <div class="text-center">
                                <!-- Uncomment to add text
                                <p class="card-text fs-6">Opéra de Saïgon</p>
                                <h1 class="card-title fw-bolder">Saigon Opera House</h1> -->
                            </div>
                        </div>
                    </div>
                    <div class="card text-bg-dark border-0 rounded-0">
                        <img src="https://via.placeholder.com/400x200?text=Random+Cake+Image+3" class="card-img rounded-0 w-100" style="height: 200px;">
                        <div class="card-img-overlay d-flex justify-content-center align-items-start bg-dark bg-opacity-25">
                            <div class="text-center">
                                <!-- Uncomment to add text
                                <p class="card-text fs-6">War Remnants Museum</p>
                                <h1 class="card-title fw-bolder"> Bảo Tàng Chứng Tích Chiến Tranh</h1> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Section -->
        <div class="container mt-5">
            <h2 class="text-center mb-5"><strong>Danh mục sản phẩm</strong></h2>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card text-bg-dark border-0 rounded-0">
                        <img src="https://via.placeholder.com/400x200?text=Random+Cake+Image+4" class="card-img rounded-0 w-100" style="height: 200px;">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center bg-dark bg-opacity-25">
                            <div class="text-center">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <a href="{{ route('categories.show', ['id' => $category->id]) }}" class="btn btn-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <section class="featured-categories section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Danh mục sản phẩm phổ biến</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Category -->
                        <div class="single-category">
                            <h3 class="heading">{{ $category->name }}</h3>
                        </div>
                        <!-- End Single Category -->
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        
        
        <!-- Scroll to Top Button -->
        <a href="#" class="scroll-top">
            <i class="lni lni-chevron-up"></i>
        </a>

        <!-- JS Files -->
        <!-- Add your additional JS files here -->

    </div>
</body>
@endsection
