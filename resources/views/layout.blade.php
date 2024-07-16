<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/')}}css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/tiny-slider.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/glightbox.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/main.css"/>
</head>
<body ng-app='tcApp' ng-controller='tcCtrl'>
    @include('page.header')

    <main>
        <div ng-controller='viewCtrl'>
            @yield('content')
        </div>
    </main>

    @include('page.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('/')}}js/angular.min.js"></script>
    <script>
        var app = angular.module('tcApp',[]);
        app.controller('tcCtrl', function($scope, $http){
            $scope.cart = {!! json_encode(session('cart')) !!}||[];
            $scope.addToCart = function(product_id, quantity){
                $http.post('/api/cart', {
                    product_id: product_id,
                    quantity: quantity,
                }).then(function(res){
                    $scope.cart = res.data.data;
                });
            }
            $scope.totalCart = function(){
                var total = 0;
                $scope.cart.forEach(sp => {
                    total += sp.quantity * sp.price;
                });
                return total;
            }
            $scope.removeCart = function(index) {
            $http.delete('/api/cart/' + index).then(function(res) {
            $scope.cart = res.data.data;
        })
            }
        });
        var viewFunction = function($scope){}
        app.controller('viewCtrl', function($scope) {
            $scope.addToCart = function(id) {
                console.log(`đã thêm sản phẩm ${id} vào giỏ hàng`);
            };
        });
    // </script>

    @yield('viewFunction')
<script>
    app.controller('viewCtrl',viewFunction);
</script>
   
      

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
