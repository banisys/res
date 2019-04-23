<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>پنل مدیریت</title>
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/bootstrap-reset.css" rel="stylesheet">
    <link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/admin/css/style.css" rel="stylesheet">
    <link href="/admin/css/style-responsive.css" rel="stylesheet" />
    <script src="/admin/js/jquery.js"></script>

    @yield('script')
</head>
<body>

<section id="container" class="">
    <!--header start-->

    <!--header end-->
        @include('layouts.aside')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            @yield('content')
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>

<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/common-scripts.js"></script>

</body>
</html>
