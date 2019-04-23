<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="طراحی شده توسط تیم فارسیتک">
    <title>فارسیتک</title>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/image/favicon.png" rel="icon"/>

    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap-rtl.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="/css/owl.transitions.css"/>
    <link rel="stylesheet" type="text/css" href="/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="/css/stylesheet-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="/css/responsive-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="/css/stylesheet-skin3.css"/>
    <script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
    <style>
        #dropdownMenuLink:hover {
            color: #c68d1e !important;
        }

        .aaa {
            background-color: #0b0b0b !important;
            opacity: .9 !important;
        }

        .dropdown-item {
            color: #EBEBEB !important;
        }

        .dropdown-item:hover {
            color: #c68d1e !important;
        }

        .btn:focus, .btn:active:focus {
            outline: none
        }
    </style>
</head>
<body>

<div class="wrapper-wide">
    <div id="header" style="background-color: #2d2d2d">
        <!-- Top Bar Start-->
        <nav id="top" class="htop" style="background-color: #1f1f1f;">
            <div class="container">
                <div class="row">
                    <span class="drop-icon visible-sm visible-xs">
                        <i class="fa fa-align-justify" style="color:#eaeaea"></i>
                    </span>
                    <div class="pull-left flip left-top">
                        <div id="top-links" class="nav pull-right flip">
                            <ul>
                                @if (Route::has('login'))
                                    @auth
                                        <li style="width: 329px;height: 25px;position:relative;background-color:#1f1f1f;">
                                            <div class="dropdown show" id="cccc"
                                                 style="    float: right;vertical-align: middle;">
                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                   id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false"
                                                   style="margin-right: 21px;margin-top:-26px;color:#eaeaea;height:0">

                                                    کاربر عزیز، {{ Auth::user()->name }} خوش
                                                    آمدید.
                                                    <i class="fa fa-sort-desc" id="khoshamad2"></i>
                                                </a>

                                                <div class="dropdown-menu aaa" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="{{ route('profile') }}"
                                                       style="color:#444444;margin-right: 10px">پروفایل</a> <br>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();"
                                                       style="margin-right: 10px">خروج</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          style="display: none;">
                                                        @csrf
                                                    </form>

                                                </div>
                                            </div>


                                        </li>
                                    @else
                                        <li style="margin-top:-5px;"><a style="font-size: 15px;"
                                                                        href="{{ route('login') }}">ورود</a></li>
                                        <li style="margin-top:-5px;margin-right: 8px"><a style="font-size: 15px;"
                                                                                         href="{{ route('register') }}">ثبت
                                                نام</a></li>
                                    @endauth
                                @endif
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </nav>
        <!-- Top Bar End-->
        <!-- Header Start-->
        <header class="header-row">
            <div class="container">
                <div class="table-container">
                    <!-- Logo Start -->
                    <div class="col-table-cell col-lg-4 col-md-4 col-sm-12 col-xs-12 inner">
                        <div id="logo">
                            <a href="index.html">
                                <img class="img-responsive"
                                     style="width: 240px;margin:12px 1px 10px 0;"
                                     src="/image/farsitech.png"
                                     title="MarketShop" alt="MarketShop"/>
                            </a>
                        </div>
                    </div>
                    <!-- Logo End -->
                    <!-- جستجو Start-->
                    <div class="col-table-cell col-lg-5 col-md-5 col-md-push-0 col-sm-6 col-sm-push-6 col-xs-12">
                        <div id="search" class="input-group">
                            <form method="post" action="{{route('search.index')}}">
                                {{csrf_field()}}
                                <input id="filter_name" type="text" name="search"
                                       placeholder="نام محصول , برند و یا دسته مورد علاقه خود را جستجو کنید…"
                                       class="form-control input-lg" style="color: #e7e7e7"/>
                                <button type="submit" class="button-search"><i style="color: #c68d1e"
                                                                               class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- جستجو End-->
                    <!-- Mini Cart Start-->
                    <?php
                    use App\Cart;
                    if (isset($_COOKIE['cart'])) {
                        $carts = Cart::where('cookie', $_COOKIE['cart'])->get();
                        $sum = 0;
                        foreach ($carts as $cart) {
                            $sum += $cart->product->price * $cart->num;
                        }
                    }
                    ?>
                    <div class="col-table-cell col-lg-3 col-md-3 col-md-pull-0 col-sm-6 col-sm-pull-6 col-xs-12 inner">
                        <div id="cart">
                            <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..."
                                    class="heading dropdown-toggle"><span class="cart-icon"></span>
                                @if (isset($_COOKIE['cart']))
                                    <span style="color: #eaeaea" id="cart-total">
                                        {{count($carts)}} آیتم - {{$sum}} تومان
                                </span>
                                @else
                                    <a style="color: #eaeaea;display:inline-block;line-height:32px;">
                                        سبد خرید 0
                                    </a>

                                @endif
                            </button>
                            @if (isset($_COOKIE['cart']))
                                @if (sizeof($carts)>0)
                                    <style>
                                        #header #cart.open .heading span::after {
                                            display: block
                                        }
                                    </style>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <table class="table">
                                                <tbody>
                                                @foreach($carts as $cart)
                                                    <tr>
                                                        <td class="text-center">
                                                            <img class="img-thumbnail" style="width: 70px"
                                                                 title="{{$cart->product->name}}"
                                                                 src="{{$cart->product->image}}">
                                                        </td>
                                                        <td class="text-left"><a
                                                                    href="{{route('single.page',['product'=>$cart->product->id])}}">{{$cart->product->name}}</a>
                                                        </td>
                                                        <td class="text-right">x{{$cart->num}}</td>
                                                        <td class="text-right">{{$cart->product->price*$cart->num}}تومان
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                @endforeach

                                            </table>
                                        </li>
                                        <li>
                                            <div>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-right"><strong>جمع کل:</strong></td>
                                                        <td class="text-right">{{$sum}} تومان</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                                <p class="checkout">
                                                    <a href="{{route('cart.index')}}" class="btn btn-primary">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        مشاهده سبد
                                                    </a>&nbsp;&nbsp;&nbsp;
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            @endif
                        </div>
                    </div>
                    <!-- Mini Cart End-->
                </div>
            </div>
        </header>
        <!-- Header End-->
        <!-- Main آقایانu Start-->
        <nav id="menu" class="navbar">
            <div class="navbar-header"><span class="visible-xs visible-sm"> منو <b></b></span></div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a class="home_link" title="خانه" href="index.html"><span>خانه</span></a></li>
                    {{--<li class="mega-menu dropdown sub"><a>دسته ها</a>--}}
                        {{--<span class="submore"></span>--}}
                        {{--<div class="dropdown-menu" style="margin-left: -1047.88px; display: none;">--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">البسه</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">آقایان <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته ها</a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته ها</a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته ها</a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته ها</a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته جدید</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">بانوان</a></li>--}}
                                        {{--<li><a href="category.html">دخترانه<span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته ها </a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته جدید</a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته جدید</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">پسرانه</a></li>--}}
                                        {{--<li><a href="category.html">نوزاد</a></li>--}}
                                        {{--<li><a href="category.html">لوازم <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">الکترونیکی</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">لپ تاپ <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید </a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید </a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته جدید </a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">رومیزی <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید </a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته جدید </a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته جدید </a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">دوربین <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">موبایل و تبلت <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید</a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">صوتی و تصویری <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید </a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته جدید </a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">لوازم خانگی</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">کفش</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">آقایان</a></li>--}}
                                        {{--<li><a href="category.html">بانوان <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید </a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته ها </a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">دخترانه</a></li>--}}
                                        {{--<li><a href="category.html">پسرانه</a></li>--}}
                                        {{--<li><a href="category.html">نوزاد</a></li>--}}
                                        {{--<li><a href="category.html">لوازم <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید</a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید</a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته ها</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">ساعت</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">ساعت مردانه</a></li>--}}
                                        {{--<li><a href="category.html">ساعت زنانه</a></li>--}}
                                        {{--<li><a href="category.html">ساعت بچگانه</a></li>--}}
                                        {{--<li><a href="category.html">لوازم</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">جواهرات</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">نقره <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید</a></li>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">طلا <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">تست 1</a></li>--}}
                                                    {{--<li><a href="category.html">تست 2</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">الماس</a></li>--}}
                                        {{--<li><a href="category.html">مروارید <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">زیورآلات آقایان</a></li>--}}
                                        {{--<li><a href="category.html">زیورآلات کودکان <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">زیردسته های جدید </a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">زیبایی و سلامت</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">عطر و ادکلن</a></li>--}}
                                        {{--<li><a href="category.html">آرایشی</a></li>--}}
                                        {{--<li><a href="category.html">ضد آفتاب</a></li>--}}
                                        {{--<li><a href="category.html">مراقبت از پوست</a></li>--}}
                                        {{--<li><a href="category.html">مراقبت از چشم</a></li>--}}
                                        {{--<li><a href="category.html">مراقبت از مو</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="clearfix visible-lg-block"></div>--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">کودک و نوزاد</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">اسباب بازی</a></li>--}}
                                        {{--<li><a href="category.html">بازی <span>›</span></a>--}}
                                            {{--<span class="submore"></span>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="category.html">تست 25</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="category.html">پازل</a></li>--}}
                                        {{--<li><a href="category.html">سرگرمی</a></li>--}}
                                        {{--<li><a href="category.html">متنوع</a></li>--}}
                                        {{--<li><a href="category.html">سلامت و امنیت</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">ورزشی</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">دوچرخه سواری</a></li>--}}
                                        {{--<li><a href="category.html">دویدن</a></li>--}}
                                        {{--<li><a href="category.html">شنا</a></li>--}}
                                        {{--<li><a href="category.html">فوتبال</a></li>--}}
                                        {{--<li><a href="category.html">گلف</a></li>--}}
                                        {{--<li><a href="category.html">موج سواری</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">خانه و باغچه</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">لوازم خواب</a></li>--}}
                                        {{--<li><a href="category.html">خوراک</a></li>--}}
                                        {{--<li><a href="category.html">لوازم منزل</a></li>--}}
                                        {{--<li><a href="category.html">آشپزخانه</a></li>--}}
                                        {{--<li><a href="category.html">روشنایی</a></li>--}}
                                        {{--<li><a href="category.html">ابزارها</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="column col-lg-2 col-md-3"><a href="category.html">خوراک</a>--}}
                                {{--<span class="submore"></span>--}}
                                {{--<div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="category.html">نوشیدنی</a></li>--}}
                                        {{--<li><a href="category.html">تنقلات</a></li>--}}
                                        {{--<li><a href="category.html">میان وعده</a></li>--}}
                                        {{--<li><a href="category.html">خشک بار</a></li>--}}
                                        {{--<li><a href="category.html">شکلات</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    <li class="menu_brands dropdown sub"><a href="#">برند ها</a>
                        <span class="submore"></span>
                        <div class="dropdown-menu" style="margin-left: -991.516px;">
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/apple_logo-60x60.jpg" title="اپل" alt="اپل"></a><a
                                        href="#">اپل</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/canon_logo-60x60.jpg" title="کنون" alt="کنون"></a><a
                                        href="#">کنون</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/hp_logo-60x60.jpg" title="اچ پی" alt="اچ پی"></a><a
                                        href="#">اچ پی</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/htc_logo-60x60.jpg" title="اچ تی سی"
                                            alt="اچ تی سی"></a><a href="#">اچ تی سی</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/palm_logo-60x60.jpg" title="پالم" alt="پالم"></a><a
                                        href="#">پالم</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/sony_logo-60x60.jpg" title="سونی" alt="سونی"></a><a
                                        href="#">سونی</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/canon_logo-60x60.jpg" title="test" alt="test"></a><a
                                        href="#">test</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/apple_logo-60x60.jpg" title="test 3" alt="test 3"></a><a
                                        href="#">test 3</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/canon_logo-60x60.jpg" title="test 5" alt="test 5"></a><a
                                        href="#">test 5</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/canon_logo-60x60.jpg" title="test 6" alt="test 6"></a><a
                                        href="#">test 6</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/apple_logo-60x60.jpg" title="test 7" alt="test 7"></a><a
                                        href="#">test 7</a></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/canon_logo-60x60.jpg" title="test1" alt="test1"></a><a
                                        href="#">test1</a></div>
                            <div class="clearfix visible-lg-block"></div>
                            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img
                                            src="image/product/apple_logo-60x60.jpg" title="test2" alt="test2"></a><a
                                        href="#">test2</a></div>
                        </div>
                    </li>
                    <li class="custom-link"><a href="#">لینک های دلخواه</a></li>
                    <li class="dropdown wrap_custom_block hidden-sm hidden-xs sub"><a>بلاک سفارشی</a>
                        <span class="submore"></span>
                        <div class="dropdown-menu custom_block" style="margin-left: -440.516px;">
                            <ul>
                                <li>
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td><img alt="" src="image/banner/cms-block.jpg"></td>
                                            <td><img alt="" src="image/banner/responsive.jpg"></td>
                                            <td><img alt="" src="image/banner/cms-block.jpg"></td>
                                        </tr>
                                        <tr>
                                            <td><h4>بلاک های محتوا</h4></td>
                                            <td><h4>قالب واکنش گرا</h4></td>
                                            <td><h4>پشتیبانی ویژه</h4></td>
                                        </tr>
                                        <tr>
                                            <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا
                                                تصویری را در آن قرار دهید.
                                            </td>
                                            <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا
                                                تصویری را در آن قرار دهید.
                                            </td>
                                            <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا
                                                تصویری را در آن قرار دهید.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه
                                                        مطلب</a></strong></td>
                                            <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه
                                                        مطلب</a></strong></td>
                                            <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه
                                                        مطلب</a></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{--<li class="dropdown information-link sub"><a>برگه ها</a>--}}
                        {{--<span class="submore"></span>--}}
                        {{--<div class="dropdown-menu" style="">--}}
                            {{--<ul>--}}
                                {{--<li><a href="login.html">ورود</a></li>--}}
                                {{--<li><a href="register.html">ثبت نام</a></li>--}}
                                {{--<li><a href="category.html">دسته بندی (شبکه/لیست)</a></li>--}}
                                {{--<li><a href="product.html">محصولات</a></li>--}}
                                {{--<li><a href="cart.html">سبد خرید</a></li>--}}
                                {{--<li><a href="checkout.html">تسویه حساب</a></li>--}}
                                {{--<li><a href="compare.html">مقایسه</a></li>--}}
                                {{--<li><a href="wishlist.html">لیست آرزو</a></li>--}}
                                {{--<li><a href="search.html">جستجو</a></li>--}}
                            {{--</ul>--}}
                            {{--<ul>--}}
                                {{--<li><a href="about-us.html">درباره ما</a></li>--}}
                                {{--<li><a href="404.html">404</a></li>--}}
                                {{--<li><a href="elements.html">عناصر</a></li>--}}
                                {{--<li><a href="faq.html">سوالات متداول</a></li>--}}
                                {{--<li><a href="sitemap.html">نقشه سایت</a></li>--}}
                                {{--<li><a href="{{route('contact')}}">تماس با ما</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    <li class="contact-link"><a href="{{route('contact')}}">تماس با ما</a></li>

                </ul>
            </div>
        </nav>
        <!-- Main آقایانu End-->
    </div>