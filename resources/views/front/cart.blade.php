<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expanding Column Layout</title>
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/css/stylesheet.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
</head>
<body>
    <style>
        .sss:hover {
            color: #d0d0d0 !important;
        }

        .sss {
            color: #000000 !important;
            font-size: 18px !important;
        }
        #xxx > li{margin-left: 30px;}
        #xxx > li > a{font-size:14px;color: #828282;}
        @media screen and (max-width:560px) {
           .fa-refresh{display: none}
        }

    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('index')}}"><i class="fa fa-home" style="color: #3e3e3e;font-size:27px"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
    </nav>
<br><br>
    <div id="container-fluid" >
        <div class="container-fluid">

            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr style="color: #00609a">
                                <td class="text-right"></td>
                                <td class="text-right">نام</td>
                                <td class="text-right">تعداد</td>
                                <td class="text-right">قیمت واحد</td>
                                <td class="text-right">قیمت کل</td>
                                <td class="text-right"></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $sum = 0; ?>

                            @foreach($carts as $cart)
                                <tr>
                                    <td class="text-right">
                                        <img  src="{{$cart->food->image}}" alt="{{$cart->food->name}}"
                                             title="{{$cart->food->name}}"
                                             class="img-thumbnail" style="width: 150px;border: none;border-radius:8px;">
                                    </td>

                                    <td class="text-right">{{$cart->food->name}}</td>

                                    <td class="text-right">
                                        <div class="input-group btn-block quantity">
                                            <form class="form-horizontal tasi-form" method="post"
                                                  action="{{route('cart',['food'=>$cart->food->id])}}"
                                                  id="my_form">
                                                {{csrf_field()}}
                                                <input type="number" name="num" min="1" value="{{$cart->num}}" style="margin-top: 2px;width:45px;height:30px;padding-right: 5px"/>&nbsp;
                                                <input type="submit" id="refresh" style="position:relative;width:5px;height:21px;opacity:0;z-index: 5">
                                                <a style="position:absolute;right:55px;top:5px;display:block;">
                                                    <i class="fa fa-refresh" style="color: #128200;font-size:20px;vertical-align: middle"></i>
                                                </a>
                                            </form>
                                            <span class="input-group-btn"></span>
                                        </div>
                                    </td>

                                    <td class="text-right">{{number_format($cart->food->price)}} تومان</td>

                                    <td class="text-right">{{number_format($cart->food->price*$cart->num)}} تومان</td>

                                    <td>
                                        <a style="color: red;font-size:25px;cursor: pointer" onclick="myFunction({{$cart->food->id}})">
                                            <span>&times;</span>
                                        </a>
                                    </td>

                                    <?php $sum += $cart->food->price * $cart->num;  ?>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="direction: ltr">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table table-bordered">
                                <tbody>
                                <tr style="color: #117b00">
                                    <td class="text-right"><strong>جمع کل:</strong></td>
                                    <td class="text-right">{{number_format($sum)}} تومان</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="buttons" style="overflow: unset; margin-bottom: 100px">
                        <div class="pull-left">
                            <a href="{{route('data')}}" class="btn btn-danger">ادامه خرید</a>
                        </div>
                    </div>
                </div>

                <script>
                    function myFunction(x) {
                        $(document).ready(function () {
                            toastr.error('<a class="sss" href="cart/destroy/' + x + '">بله</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="sss" href="/cart">خیر</a>', "آیا از حذف این مورد اطمینان دارید؟", {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-bottom-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": 0,
                                "extendedTimeOut": 0,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "tapToDismiss": false
                            })
                        });
                    }
                </script>

            </div>
        </div>
    </div>
    <?php
    session()->put('amount', $sum);
    ?>

    <script src='/js/jquery-2.1.1.min.js'></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/toastr.min.js"></script>
</body>
</html>
