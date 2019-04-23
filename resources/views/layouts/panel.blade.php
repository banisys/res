@include('front/header')
<style>
    #sidebar a {
        background: #fffff7 !important;
        color: #9c9c9c !important;
    }

    ul.sidebar-menu li ul.sub li {
        background: #ffffff !important;
        color: #0b0b0b !important;
    }

    #sidebar a:hover {
        color: #000000 !important;
    }

    #main-content {
        margin-right: 100px !important;

    }

    .sidebar-menu span {
        font-size: 14px
    }

    .nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
        border: none !important;
    }

    .arrow {
        display: none !important;
    }
</style>
<link href="/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/admin/css/bootstrap-reset.css" rel="stylesheet">
<link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
<link href="/admin/css/style.css" rel="stylesheet">
<link href="/admin/css/style-responsive.css" rel="stylesheet"/>
<script src="/admin/js/jquery.js"></script>

<section id="container" style="margin-bottom:20px;display:flex;flex-direction: row;">
    <aside style="height: 500px;">
        <div id="sidebar" class="nav-collapse"
             style="position:relative;background: #fffff7;margin-right: 60px;width: 165px;">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="sub-menu">
                    <a href="#"><img src="/image/profile.png" style="width:42px;margin-left: 7px">
                        <span id="profile"> پروفایل </span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{{route('profile')}}">اطلاعات پروفایل</a></li>
                        <li><a class="" href="{{route('profile.edit')}}">تصحیح پروفایل</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="{{route('panel.order')}}">
                        <img src="/image/order.png" style="width: 41px;margin-left: 7px">
                        <span id="order"> سفارشات </span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="#"><img src="/image/question.png" style="width:41px;margin-left: 7px">
                        <span id="ask"> پرسش و پاسخ </span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{{route('ask_user.inbox')}}">پیام های دریافتی</a></li>
                        <li><a class="" href="{{route('ask_user.outbox')}}">پیام های ارسالی</a></li>
                    </ul>
                </li>

                <li class="active">
                    <a href="{{route('favorite.index')}}">
                        <img src="/image/favorite.png" style="width:39px;margin-left: 7px">
                        <span id="fav"> علاقه مندی ها </span>
                    </a>
                </li>

                <li class="active">
                    <a href="{{ route('logout') }}" style="margin-right:13px"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="icon-power-off" style="font-size:20px;color: #dc3545"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span> خروج </span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>

                    </a>
                </li>


            </ul>
            <!-- sidebar menu end-->
        </div>

    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper" style="margin-right: 0;margin-top: 0;width: auto;">
            <!-- page start-->
        @yield('content')
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>

<script src="/admin/js/common-scripts.js"></script>

@include('front/footer')