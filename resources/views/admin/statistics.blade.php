@extends('layouts.admin')

@section('content')

    <script src="/js/numscroller-1.0.js"></script>


    <?php
    $time_zone = '12600';
    //تاریخ امروز
    $today = date("Y-m-d", time() + $time_zone);
    //تاریخ دیروز
    $yesterday = date("Y-m-d", time() - 86400 + $time_zone);

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

    $read_file = file_get_contents('visit-stats.txt');
    $split_file = explode('|', $read_file);

    ?>
    <style>
        #ss {
            font-size: 18px;
            font-weight: bold
        }
    </style>
    <header class="header" style="width: 100px">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"
                 style="color: #cfd4da"></div>
        </div>
    </header>
    <div class="container" style="margin-top:15px">
        <div class="row" style="border:2px dashed #cacaca;padding:25px 0;">
            <div class="col-md-3" style="text-align: center" id="ss">
                بازدید امروز :
                <span class='numscroller' data-min='1' data-max='{{$split_file[0]}}' data-delay='.5' id="ss"
                      data-increment='1'></span>
            </div>

            <div class="col-md-3" style="text-align: center" id="ss">
                بازدید دیروز :
                <span class='numscroller' data-min='1' data-max='{{$split_file[1]}}' data-delay='.5' id="ss"
                      data-increment='1'></span>
            </div>

            <div class="col-md-3" style="text-align: center" id="ss">
                بازدید کل :
                <span class='numscroller' data-min='0' data-max='{{$split_file[2]}}' data-delay='.5' id="ss"
                      data-increment='1'></span>
            </div>

            <div class="col-md-3" style="text-align: center" id="ss">
                افراد آنلاین :
                <span id="ss">{{$online}}</span>
            </div>

        </div>
        <br> <br>
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <span style="text-align: center;font-size:30px">آمار فروش</span><span
                        style="font-size:20px"> (تومان) </span>
                <iframe style="border: none" src="{{route('statistics.chart.price')}}" height="450px"
                        width="100%"></iframe>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:first-child").addClass("active");
        });
    </script>
@endsection