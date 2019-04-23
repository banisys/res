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

</head>
<body>
<style>
    #xxx > li{margin-left: 30px;}
    #xxx > li > a{font-size:14px;color: #828282;
    }
input:focus{box-shadow: none!important;}
    .stepwizard-step p {
        margin-top: 10px;
        color: grey;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 70%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
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
<div class="container">

    <div class="stepwizard col-md-12" style="margin: auto">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a class="btn-circle"
                   style="width: 34px;height: 28px;background-color: #aeaeae;display: inline-block;color: white;"
                   disabled="disabled">1</a>
                <p>مشخصات</p>
            </div>
            <div class="stepwizard-step">
                <a style="width: 34px;height: 28px;background-color:#28a745;display: inline-block;color: white;"
                   class="btn-circle">2</a>
                <p>پرداخت</p>
            </div>
            <div class="stepwizard-step">
                <a style="width: 34px;height: 28px;background-color: #aeaeae;display: inline-block;color: white;" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>فاکتور</p>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h5 style="border-bottom: 1px dashed #c4c4c4;padding-bottom:12px;color: #7f8c9a"><i class="icon-check"></i>انتخاب شیوه پرداخت
            </h5>
        </div>
    </div>
<br><br>
    <form class="form-horizontal" method="post" action="{{route('finish')}}">
        {{csrf_field()}}

        <div class="form-group row">
            <div class="col-sm-1">
                <input type="radio" class="form-control" name="payment" value="اینترنتی" id="internet">
            </div>


            <label class="control-label col-sm-2" for="internet">پرداخت اینترنتی</label>

            <div class="col-sm-9">
                <img src="/image/credit-card.png" style="margin-top: -25px">
            </div>
        </div>
<br><br>
        <div class="form-group row">

            <div class="col-sm-1">
                <input type="radio" class="form-control" name="payment" value="در محل" id="local" checked>
            </div>


            <label class="control-label col-sm-2" for="local" style="vertical-align: middle">پرداخت در محل</label>

            <div class="col-sm-9">
                <img src="/image/point-of-service.png" style="margin-top: -25px">
            </div>
        </div>
<br><br>
        <div class="form-group" style="margin-bottom:100px">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success" style="float: left">ادامه ثبت سفارش</button>
            </div>
        </div>
    </form>
</div>


</body>
</html>


