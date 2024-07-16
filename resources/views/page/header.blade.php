 {{-- <!-- Start Header Area -->
 <header class="header navbar-area">
       
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="index.html">
                        <img src="{{asset('/')}}img/khangLM.png" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-select">
                                <div class="select-position">
                                    <select id="select1">
                                        <option selected>All</option>
                                        <option value="1">option 01</option>
                                        <option value="2">option 02</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                          
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="wishlist">
                                <a href="">
                                    <i class="lni lni-user"></i>

                                </a>
                            </div>
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">2</span>
                                </a>
                                <!-- Shopping Item -->
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>2 Items</span>
                                        <a href="cart.html">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        <li>
                                            <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                    class="lni lni-close"></i></a>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="product-details.html"><img
                                                        src="{{asset('/')}}images/header/cart-items/item1.jpg" alt="#"></a>
                                            </div>

                                            <div class="content">
                                                <h4><a href="product-details.html">
                                                        Apple Watch Series 6</a></h4>
                                                <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                    class="lni lni-close"></i></a>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="product-details.html"><img
                                                        src="{{asset('/')}}images/header/cart-items/item2.jpg" alt="#"></a>
                                            </div>
                                            <div class="content">
                                                <h4><a href="product-details.html">Wi-Fi Smart Camera</a></h4>
                                                <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">$134.00</span>
                                        </div>
                                        <div class="button">
                                            <a href="checkout.html" class="btn animate">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                           @foreach ($categories as $item)
                           <li><a href="product-grids.html">{{$item->name}}</a></li>
                           @endforeach
                           
                            
                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="index.html" class="active" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Pages</a>
                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                        <li class="nav-item"><a href="about-us.html">About Us</a></li>
                                        <li class="nav-item"><a href="faq.html">Faq</a></li>
                                        <li class="nav-item"><a href="login.html">Login</a></li>
                                        <li class="nav-item"><a href="register.html">Register</a></li>
                                        <li class="nav-item"><a href="mail-success.html">Mail Success</a></li>
                                        <li class="nav-item"><a href="404.html">404 Error</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Shop</a>
                                    <ul class="sub-menu collapse" id="submenu-1-3">
                                        <li class="nav-item"><a href="product-grids.html">Shop Grid</a></li>
                                        <li class="nav-item"><a href="product-list.html">Shop List</a></li>
                                        <li class="nav-item"><a href="product-details.html">shop Single</a></li>
                                        <li class="nav-item"><a href="cart.html">Cart</a></li>
                                        <li class="nav-item"><a href="checkout.html">Checkout</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                                    <ul class="sub-menu collapse" id="submenu-1-4">
                                        <li class="nav-item"><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a>
                                        </li>
                                        <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
                                        <li class="nav-item"><a href="blog-single-sidebar.html">Blog Single
                                                Sibebar</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.html" aria-label="Toggle navigation">Contact Us</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="navbar navbar-expand">
                    
                    <ul class="navbar-nav ms-auto">
                        @if (!Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('login') }}"> Login </i></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}"> Register </i></a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">Hello , {{Auth::user()->username}}</a>
                            <ul class="sub-menu collapse" id="submenu-1-2">
                                <li class="nav-item"><a href="{{route('logout')}}">Log out</a></li>
                            </ul>
                        </li>
                       
               
                        @endif
                    </ul>
                  
                </div>

                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header> --}}

<header>
    <nav class="navbar navbar-expand-lg" style="color: white; background-color:#4c5265;">
        <div class="container" >
          <a class="navbar-brand" href="{{ route('home') }}"><img src="{{URL::asset('/img/KhangLM.png')}}" style="border-radius: 50%;width: 150px;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}" style="color:#b9e2f5"><i class="fa-solid fa-house"></i>
                  Trang chủ</a>
              </li>
             
           
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:#b9e2f5" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-list"></i>
                 Danh mục
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  @foreach ($categories as $item)
                  <li><a class="dropdown-item" href="{{ URL::to('category/'.$item->id) }}">{{ $item->name }}</a></li>
              
                  @endforeach
                
                 
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#!product" style="color:#b9e2f5"><i class="fa-solid fa-gift"></i>
                  Tất cả sản phẩm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#!aboutus" style="color:#b9e2f5">Về chúng tôi</a>
              </li>
              
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ URL::to('favorite') }}" style="color:#b9e2f5"><i class="fa-solid fa-heart"></i>
                  Yêu thích</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('cart')}}" style="color:#b9e2f5"><i class="fa-solid fa-cart-shopping"></i>
                  Giỏ hàng</a>
              </li>
           
              <li class="nav-item dropdown">
                @if (!Auth::check())
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#b9e2f5"><i class="fa-solid fa-user"></i>
                Tài khoản
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                   
                  <li>
                    <a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
                  <li><hr class="dropdown-divider"></li>
                  @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="" style="color:#b9e2f5"><i class="fa-solid fa-user"></i>
                                Hello , {{Auth::user()->username}}</a>

                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <a class="dropdown-item"  href="{{route('logout')}}" style="color:#b9e2f5">
                                        Đăng xuất</a>
                                        <a class="dropdown-item"  href="{{route('changePassword')}}" style="color:#b9e2f5">
                                            Đổi mật khẩu</a>
                                            {{-- <a class="dropdown-item"  href="{{route('orders.detal')}}" style="color:#b9e2f5">
                                                Theo dõi đơn hàng</a> --}}
                                </ul>
                            
                               
                        
                        </li>
                    @endif
                  
     
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
</header>