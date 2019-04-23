<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>سیستم ثبت سفارش</title>
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/stylesheet.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/toastr.min.js"></script>
</head>
<body>
@if(isset($xx))
    <script>
        alert("لطفا لیست سفارش خود را تشکیل دهید");
    </script>
@endif
<style>
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

        #hh {
            position: absolute;
            top: 108%;
            right: 86%
        }

        .card {
            width: 100%;
        }

    }

    @media screen and (max-width: 1290px) {
        img {
            width: 40%;
            top: -238%;
            right: 29%;
        }

    }

    @media screen and (max-width: 760px) {
        img {
            width: 18%;
            top: -80%;
            right: 11%;
        }

        #pey {
            left: 3px;
            bottom: 3px !important;
        }

        #cart {
            top: 3px !important;
            left: 3px !important;
        }

        #card0, #card2 {
            display: none
        }

        .card {
            width: 99%;
            margin: auto;
            height: 99%
        }

        #offer {
            top: -20% !important;
            right: 35% !important;
            font-size: 22px !important;
        }

        #hh {
            width: 60% !important;
            right: 20% !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
        }
    }

    @media screen and (max-width: 1274px) {
        input {
            width: 60px !important;
        }

        #register {
            font-size: 13px !important;
        }
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
if (isset($_COOKIE['cart'])) {
    $carts = Cart::where('cookie', $_COOKIE['cart'])->get();
    $sum = 0;
    foreach ($carts as $cart) {
        $sum += $cart->food->price * $cart->num;
    }
}
?>
<div id="cart" style="position: absolute;left:8px;top:8px;z-index:5;">

    <button type="button"
            onclick="javascript:location.href='{{route('cart.index')}}'"
            style="background-color: unset;border:2px solid #ffffff;padding:3px 15px;border-radius:5px">
        <a id="jj">
                <span style="color: #ffffff" id="cart-total">
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

<!-- Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" id="pey"
        style="position: absolute;right:8px;bottom:8px;z-index:5;width:110px;
        background-color: unset;border:white 2px solid;border-radius:6px;padding:3px;"
        data-target=".bd-example-modal-lg">پیگیری سفارش
</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="main">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="شماره سفارش خود را وارد کنید..." name="search"
                           style="border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius:5px;
                           border-bottom-right-radius:5px;">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button" onclick="follow()"
                                style="border-top-right-radius: 0;border-bottom-right-radius: 0;
                                border-top-left-radius:5px;border-bottom-left-radius:5px;">
                            <i class="fa fa-search" style="font-size: 18px;vertical-align: middle;"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-md-12" id="bbb">
                        <span class="d-flex justify-content-center" id="aaa">...</span>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function follow() {
        var search = $("input[name=search]").val();
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                data: {search: search},
                url: "{{route('follow')}}",
            }).done(
                function (msg) {
                    $("#aaa").remove();
                    $("#bbb").prepend(msg['status']);
                });
        });
    }
</script>


<section class="strips">

    <article class="strips__strip">

        <div class="strip__content">

            <h1 class="strip__title" data-name="Lorem">{{$cats[0]->name}}
                <img src="{{$cats[0]->image}}" style="position: absolute;">
            </h1>
            <div class="strip__inner-text">
                <div class="container">
                    <h2 style="position: absolute;top:-30%;right:42%;border-bottom: 1px white dashed;border-top: 1px white dashed;padding: 8px"
                        id="offer">
                        پیشنهاد ویژه</h2>
                    <div class="row">
                        @for($x = 0; $x < 3; $x++)
                            <div class="col-md-4" id="card{{$x}}">
                                <div class="card"
                                     style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <img class="card-img-top" src="{{$offer1[$x]->image}}" alt="{{$offer1[$x]->name}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$offer1[$x]->name}}</h5>
                                        <h6 class="card-title">{{number_format($offer1[$x]->price)}} تومان</h6>
                                        <input type="number" name="number{{$x}}" min="1" value="1"
                                               style="float: right;width: 106px;height:34px;color:#282e36;padding-right: 8px">
                                        <a onclick="myFunction{{$x}}({{$offer1[$x]->id}})" class="btn btn-danger"
                                           id="register"
                                           style="float: left">ثبت سفارش</a>
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
                                            url: "cart/ajax/" + id,
                                            success:
                                                toastr.success("به لیست سفارشات افزوده شد.", "", {
                                                    "closeButton": false,
                                                    "debug": false,
                                                    "newestOnTop": false,
                                                    "positionClass": "toast-bottom-left",
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
                                                $("#jj").append("<span style=\"color: #ffffff\" id=\"cart-total\">" + msg['carts'] + " آیتم - " + msg['sum'].toLocaleString() + " تومان</span>");
                                            });
                                    });
                                }
                            </script>
                        @endfor

                    </div>
                    <a href="{{route('list',['cat'=>$cats[0]->id])}}" id="hh" class="btn btn-success"
                       style="float: left;color: #ffffff;width:120px;">نمایش لیست کامل</a>
                </div>
            </div>
        </div>
    </article>
    <article class="strips__strip">

        <div class="strip__content">

            <h1 class="strip__title" data-name="Lorem">{{$cats[1]->name}}
                <img src="{{$cats[1]->image}}" style="position: absolute;">
            </h1>
            <div class="strip__inner-text">
                <div class="container">
                    <h2 style="position: absolute;top:-30%;right:42%;border-bottom: 1px white dashed;border-top: 1px white dashed;padding: 8px"
                        id="offer">
                        پیشنهاد ویژه</h2>
                    <div class="row">
                        @for($x = 0; $x < 3; $x++)
                            <div class="col-md-4" id="card{{$x}}">
                                <div class="card"
                                     style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <img class="card-img-top" src="{{$offer2[$x]->image}}" alt="{{$offer2[$x]->name}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$offer2[$x]->name}}</h5>
                                        <h6 class="card-title">{{number_format($offer2[$x]->price)}} تومان</h6>
                                        <input type="number" name="number{{$x}}" min="1" value="1"
                                               style="float: right;width: 106px;height:34px;color:#282e36;padding-right: 8px">
                                        <a onclick="myFunction{{$x}}({{$offer2[$x]->id}})" class="btn btn-danger"
                                           id="register"
                                           style="float: left">ثبت سفارش</a>
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
                                            url: "cart/ajax/" + id,
                                            success:
                                                toastr.success("به لیست سفارشات افزوده شد.", "", {
                                                    "closeButton": false,
                                                    "debug": false,
                                                    "newestOnTop": false,
                                                    "positionClass": "toast-bottom-left",
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
                                                $("#jj").append("<span style=\"color: #ffffff\" id=\"cart-total\">" + msg['carts'] + " آیتم - " + msg['sum'].toLocaleString() + " تومان</span>");
                                            });
                                    });
                                }
                            </script>
                        @endfor

                    </div>
                    <a href="{{route('list',['cat'=>$cats[1]->id])}}" id="hh" class="btn btn-success"
                       style="float: left;color: #ffffff;width:120px;">نمایش لیست کامل</a>
                </div>
            </div>
        </div>
    </article>
    <article class="strips__strip">

        <div class="strip__content">

            <h1 class="strip__title" data-name="Lorem">{{$cats[2]->name}}
                <img src="{{$cats[2]->image}}" style="position: absolute;">
            </h1>
            <div class="strip__inner-text">
                <div class="container">
                    <h2 style="position: absolute;top:-30%;right:42%;border-bottom: 1px white dashed;border-top: 1px white dashed;padding: 8px"
                        id="offer">
                        پیشنهاد ویژه</h2>
                    <div class="row">
                        @for($x = 0; $x < 3; $x++)
                            <div class="col-md-4" id="card{{$x}}">
                                <div class="card"
                                     style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <img class="card-img-top" src="{{$offer3[$x]->image}}" alt="{{$offer3[$x]->name}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$offer3[$x]->name}}</h5>
                                        <h6 class="card-title">{{number_format($offer3[$x]->price)}} تومان</h6>
                                        <input type="number" name="number{{$x}}" min="1" value="1"
                                               style="float: right;width: 106px;height:34px;color:#282e36;padding-right: 8px">
                                        <a onclick="myFunction{{$x}}({{$offer3[$x]->id}})" class="btn btn-danger"
                                           id="register"
                                           style="float: left">ثبت سفارش</a>
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
                                            url: "cart/ajax/" + id,
                                            success:
                                                toastr.success("به لیست سفارشات افزوده شد.", "", {
                                                    "closeButton": false,
                                                    "debug": false,
                                                    "newestOnTop": false,
                                                    "positionClass": "toast-bottom-left",
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
                                                $("#jj").append("<span style=\"color: #ffffff\" id=\"cart-total\">" + msg['carts'] + " آیتم - " + msg['sum'].toLocaleString() + " تومان</span>");
                                            });
                                    });
                                }
                            </script>
                        @endfor

                    </div>
                    <a href="{{route('list',['cat'=>$cats[2]->id])}}" id="hh" class="btn btn-success"
                       style="float: left;color: #ffffff;width:120px;">نمایش لیست کامل</a>
                </div>
            </div>
        </div>
    </article>
    <article class="strips__strip">

        <div class="strip__content">

            <h1 class="strip__title" data-name="Lorem">{{$cats[3]->name}}
                <img src="{{$cats[3]->image}}" style="position: absolute;">
            </h1>
            <div class="strip__inner-text">
                <div class="container">
                    <h2 style="position: absolute;top:-30%;right:42%;border-bottom: 1px white dashed;border-top: 1px white dashed;padding: 8px"
                        id="offer">
                        پیشنهاد ویژه</h2>
                    <div class="row">
                        @for($x = 0; $x < 3; $x++)
                            <div class="col-md-4" id="card{{$x}}">
                                <div class="card"
                                     style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <img class="card-img-top" src="{{$offer4[$x]->image}}" alt="{{$offer4[$x]->name}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$offer4[$x]->name}}</h5>
                                        <h6 class="card-title">{{number_format($offer4[$x]->price)}} تومان</h6>
                                        <input type="number" name="number{{$x}}" min="1" value="1"
                                               style="float: right;width: 106px;height:34px;color:#282e36;padding-right: 8px">
                                        <a onclick="myFunction{{$x}}({{$offer4[$x]->id}})" class="btn btn-danger"
                                           id="register"
                                           style="float: left">ثبت سفارش</a>
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
                                            url: "cart/ajax/" + id,
                                            success:
                                                toastr.success("به لیست سفارشات افزوده شد.", "", {
                                                    "closeButton": false,
                                                    "debug": false,
                                                    "newestOnTop": false,
                                                    "positionClass": "toast-bottom-left",
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
                                                $("#jj").append("<span style=\"color: #ffffff\" id=\"cart-total\">" + msg['carts'] + " آیتم - " + msg['sum'].toLocaleString() + " تومان</span>");
                                            });
                                    });
                                }
                            </script>
                        @endfor

                    </div>
                    <a href="{{route('list',['cat'=>$cats[3]->id])}}" id="hh" class="btn btn-success"
                       style="float: left;color: #ffffff;width:120px;">نمایش لیست کامل</a>
                </div>
            </div>
        </div>
    </article>
    <article class="strips__strip">

        <div class="strip__content">

            <h1 class="strip__title" data-name="Lorem">{{$cats[4]->name}}
                <img src="{{$cats[4]->image}}" style="position: absolute;">
            </h1>
            <div class="strip__inner-text">
                <div class="container">
                    <h2 style="position: absolute;top:-30%;right:42%;border-bottom: 1px white dashed;border-top: 1px white dashed;padding: 8px"
                        id="offer">
                        پیشنهاد ویژه</h2>
                    <div class="row">
                        @for($x = 0; $x < 3; $x++)
                            <div class="col-md-4" id="card{{$x}}">
                                <div class="card"
                                     style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <img class="card-img-top" src="{{$offer5[$x]->image}}" alt="{{$offer5[$x]->name}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$offer5[$x]->name}}</h5>
                                        <h6 class="card-title">{{number_format($offer5[$x]->price)}} تومان</h6>
                                        <input type="number" name="number{{$x}}" min="1" value="1"
                                               style="float: right;width: 106px;height:34px;color:#282e36;padding-right: 8px">
                                        <a onclick="myFunction{{$x}}({{$offer5[$x]->id}})" class="btn btn-danger"
                                           id="register"
                                           style="float: left">ثبت سفارش</a>
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
                                            url: "cart/ajax/" + id,
                                            success:
                                                toastr.success("به لیست سفارشات افزوده شد.", "", {
                                                    "closeButton": false,
                                                    "debug": false,
                                                    "newestOnTop": false,
                                                    "positionClass": "toast-bottom-left",
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
                                                $("#jj").append("<span style=\"color: #ffffff\" id=\"cart-total\">" + msg['carts'] + " آیتم - " + msg['sum'].toLocaleString() + " تومان</span>");
                                            });
                                    });
                                }
                            </script>
                        @endfor

                    </div>
                    <a href="{{route('list',['cat'=>$cats[4]->id])}}" id="hh" class="btn btn-success"
                       style="float: left;color: #ffffff;width:120px;">نمایش لیست کامل</a>
                </div>
            </div>
        </div>
    </article>
    <i class="fa fa-close strip__close"></i>

</section>
<script src='/js/jquery-2.1.1.min.js'></script>
<script src="/js/index.js"></script>
<script src="/js/bootstrap.min.js"></script>

<?php
//اختلاف زمانی سرور
$time_zone = '12600';
//تاریخ امروز
$today = date("Y-m-d", time() + $time_zone);
//تاریخ دیروز
$yesterday = date("Y-m-d", time() - 86400 + $time_zone);
//آدرس فایل
$file_src = 'visit-stats.txt';
chmod($file_src, 0755);
//خواندن فایل
$read_file = file_get_contents($file_src);
//اگر فایل خالی نبود
if (filesize($file_src) > 0 || $read_file != '') {
    $split_file = explode('|', $read_file);
    //print_r($split_file);
    $modify = $split_file[3];
    //اگر تاریخ آخرین ویرایش برابر تاریخ امروز نبود
    if ($modify != $today) {
        $today_visit = 1;
        if ($modify == $yesterday) {
            $yesterday_visit = $split_file[0];
        } else {
            $yesterday_visit = 0;
        }
        $total_visit = $split_file[2] + 1;
        $last_modify = $today;
    } //اگر تاریخ آخرین ویرایش برابر امروز بود
    else {
        $today_visit = $split_file[0] + 1;
        $yesterday_visit = $split_file[1];
        $total_visit = $split_file[2] + 1;
        $last_modify = $today;
    }
} //اگر فایل خالی بود
else {
    $today_visit = 1;
    $yesterday_visit = 0;
    $total_visit = 1;
    $last_modify = $today;
}
//نوشتن آمار جدید در فایل
$file_src_handle = fopen($file_src, 'w+');
$visit_data = $today_visit . '|' . $yesterday_visit . '|' . $total_visit . '|' . $last_modify;
fwrite($file_src_handle, $visit_data);
fclose($file_src_handle);
//محاسبه تعداد کاربران آنلاین
$config_array = array(
    'user_time' => date("YmdHis", time() + $time_zone),
    'user_ip' => $_SERVER['REMOTE_ADDR'],
    'file_name' => 'visit-online.txt'
);
chmod($config_array['file_name'], 0755);
//خواندن اطلاعات فایل
$online_file = file_get_contents($config_array['file_name']);
//تجزیه به آرایه
$online_file = explode("\r\n", $online_file);
//حذف مقادیر خالی
foreach ($online_file as $key => $value) {
    if (is_null($value) || $value == '') {
        unset($online_file[$key]);
    }
}
//حذف آی پی های قدیمی و آی پی فعلی
foreach ($online_file as $key => $value) {
    $user_ip_time = explode("|", $value);
    if ($user_ip_time[1] <= date("YmdHis", time() + $time_zone - 300)) {
        unset($online_file[$key]);
    }
    if ($user_ip_time[0] == $config_array['user_ip']) {
        unset($online_file[$key]);
    }
}
//محاسبه تعداد افراد آنلاین
$online = 1;
foreach ($online_file as $online_users) {
    $user_ip_time = explode("|", $online_users);
    if ($user_ip_time[1] >= date("YmdHis", time() + $time_zone - 300)) {
        $online++;
    }
}
//آمار کاربرانی که آنلاین هستند به اضافه کاربر فعلی
$new_online = $config_array['user_ip'] . "|" . $config_array['user_time'] . "\r\n";;
foreach ($online_file as $key => $value) {
    $new_online .= $value . "\r\n";
}
//نوشتن آمار جدید در فایل
$file_src_handle = fopen($config_array['file_name'], 'w+');
fwrite($file_src_handle, $new_online);
fclose($file_src_handle);


?>

</body>
</html>
