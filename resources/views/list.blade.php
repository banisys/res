<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expanding Column Layout</title>
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/stylesheet.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
    <link rel="stylesheet" href="/css/preload.css">
</head>
<body>
<div class='loader'></div>

<style>
    .sss:hover {
        color: #d0d0d0 !important;
    }

    .sss {
        color: #000000 !important;
        font-size: 18px !important;
    }

    #xxx > li {
        margin-left: 30px;
    }

    #xxx > li > a {
        font-size: 14px;
        color: #1a1a1a;
    }

    .card-body {
        text-align: center;
    }

    .btn {
        color: #f0f0f8 !important;
    }
    .form-control, .property-content {
        direction: rtl !important;
    }

    .dark.classy-nav-container a {
        color: rgb(52, 58, 64);
    }

    .pagination{padding-right: unset!important;}

    .classynav ul li a {
        color: #343a40 !important;
    }

    .main-header-area {
        background-color: rgba(255, 255, 255, 0.44);
    }

    .main-header-area .south-search-form input {
        border: 1px solid rgba(0, 0, 0, 0.43);
    }

    .main-header-area .south-search-form button {
        color: #495057;
    }

    /*.nav-brand{background-color: #fff!important;*/
    /*border-radius: 16px!important;}*/
    /*.classynav ul li a {*/
    /*color: #fff !important;*/
    /*}*/
    .main-header-area .classy-nav-container {
        border-bottom: 2px solid #1a1a1a !important;
    }
    .active span{color: rgb(26, 26, 26)
    }
    .pagination li{padding-left:2px!important;}
    .pagination li a , .pagination li span {font-size: 20px;border: 1px solid #575757;padding-left: 10px;padding-right: 10px;border-radius:3px}

    body,nav {
        background: #D1913C; /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #FFD194, #D1913C); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #FFD194, #D1913C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    #aaa {
        font-size: 22px
    }

    .main {
        width: 50%;
        margin: 50px auto;
    }

    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    @media screen and (max-width: 1500px) {
        img {
            top: -280%;
            right: 27%;
        }

        .card {
            width: 19rem;
        }

        #hh {
            position: absolute;
            top: 108%;
            right: 86%
        }

    }
    @media screen and (max-width: 950px) {
        #cart{margin-left:10%}
    }
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background:#d1913c;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background:#1a1a1a;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background:#1a1a1a;
    }
</style>


<?php
use App\Cart;
if (isset($_COOKIE['cart'])) {
    $carts = Cart::where('cookie', $_COOKIE['cart'])->get();
    $sum = 0;
    foreach ($carts as $cart) {
        $sum += $cart->food->price * $cart->num;
    }
}
?>

<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="{{route('index')}}"><i class="fa fa-home" style="color: #1a1a1a;font-size:27px"></i></a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" id="xxx">
            <li class="nav-item">
                <a class="nav-link" href="{{route('list',['cat'=>$cats[0]->id])}}">{{$cats[0]->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('list',['cat'=>$cats[1]->id])}}">{{$cats[1]->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('list',['cat'=>$cats[2]->id])}}">{{$cats[2]->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('list',['cat'=>$cats[3]->id])}}">{{$cats[3]->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('list',['cat'=>$cats[4]->id])}}">{{$cats[4]->name}}</a>
            </li>
        </ul>

    </div>
    <div id="cart" class="navbar-brand mr-auto">
        <button type="button"
                style="background-color: unset;border:2px solid #242424;border-radius:5px;padding: 0 10px">
            <a href="{{route('cart.index')}}" id="jj">
                <span style="color: #242424;font-size: 15px;" id="cart-total">
                    @if (isset($_COOKIE['cart']) )
                        @if (sizeof($carts)>0 )
                            {{sizeof($carts)}} آیتم - {{number_format($sum)}} تومان
                        @else
                            لیست سفارشات : 0
                        @endif
                    @else
                        لیست سفارشات : 0
                    @endif
                </span>
            </a>
        </button>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
</div>
<br><br>


<div class="container">
    <div class="row">
        <?php $x = 0; ?>
        @foreach($foods as $food)
            <div class="col-md-4 d-flex justify-content-center" style="margin-bottom:5%">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <img class="card-img-top" src="{{$food->image}}" alt="{{$food->name}}">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#aa6b18;">{{$food->name}}</h5>
                        <h6 class="card-title">{{number_format($food->price)}} تومان</h6>
                        <input type="number" name="number{{$x}}" min="1" value="1"
                               style="float: right;width: 106px;height:34px;color:#282e36;padding-right: 8px">
                        <a onclick="myFunction{{$x}}({{$food->id}})" class="btn btn-danger"
                           style="float: left;background-color: #d1913c;border-color: unset">ثبت سفارش</a>
                    </div>
                </div>
            </div>
            <script>
                function myFunction{{$x}}(id) {
                    var num = $("input[name=number{{$x}}]").val();

                    $(document).ready(function () {
                        $.ajax({
                            type: 'GET',
                            data: {num: num},
                            url: "/cart/ajax/" + id,
                            success:
                                toastr.success("به لیست سفارشات افزوده شد.", "", {
                                    "closeButton": false,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut",
                                    "progressBar": true
                                })
                        }).done(
                            function (msg) {
                                $("#cart-total").remove();
                                $("#jj").append("<span style=\"color: black;font-size: 15px\" id=\"cart-total\">" + msg['carts'] + " آیتم - " + msg['sum'].toLocaleString() + " تومان</span>");
                            });
                    });
                }
            </script>
            <?php $x++; ?>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center">
            {{$foods->links()}}
        </div>
    </div>
</div>


<script src='/js/jquery-2.1.1.min.js'></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/toastr.min.js"></script>
</body>
</html>
