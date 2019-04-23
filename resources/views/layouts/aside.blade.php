<aside>
    <div id="sidebar" class="nav-collapse ">

        <ul class="sidebar-menu">
            <li>
                <a href="{{route('statistics')}}">
                    <i class="icon-dashboard icon-large"></i>
                    <span> داشبورد </span>
                </a>
            </li>
            <li class="sub-menu">

                <a href="#"><i class="icon-food icon-large"></i>
                    <span> منوی غذا </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('food.index')}}">لیست غذاها</a></li>
                    <li><a class="" href="{{route('food.create')}}">افزودن غذا</a></li>
                </ul>

            </li>

            <li>
                <a href="{{route('order.admin_list')}}">
                    <i class="icon-check icon-large"></i>
                    <span> سفارشات </span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="{{route('cat.index')}}">
                    <i class="icon-tags icon-large"></i>
                    <span> دسته ها </span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="#"><i class="icon-user icon-large"></i>
                    <span> پرسنلین </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    {{--@can('pro_edit')--}}
                    <li><a class="" href="{{route('personel.index')}}">لیست پرسنلین</a></li>
                    <li><a class="" href="{{route('personel.create')}}">افزودن پرسنل</a></li>
                    <li><a class="" href="{{route('task.create')}}">مدیریت نقش ها</a></li>
                    {{--@endcan--}}
                </ul>
            </li>

            <li class="sub-menu">
                <a href="#"><i class="icon-briefcase icon-large"></i>
                    <span> مدیران </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    {{--@can('pro_edit')--}}
                    <li><a class="" href="{{route('user.index')}}">لیست مدیران</a></li>
                    <li><a class="" href="{{route('role.index')}}">لیست سطوح دسترسی</a></li>
                    <li><a class="" href="{{route('permission.index')}}">لیست دسترسی ها</a></li>
                    {{--@endcan--}}
                </ul>
            </li>

            <li>

                <a href="{{ route('logout') }}" id="exit" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="icon-power-off"></i>خروج
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->