<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expanding Column Layout</title>

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/css/stylesheet.css">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <!-- original: http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css -->
</head>
<body>
<style>


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
        color: #828282;
    }

    #container, #map {
        padding: 0;
        margin: 0;
        height: 460px;
    }

    .leaflet-control-attribution > :first-child {
        display: none
    }

    ::placeholder {
        color: #ff5959 !important;
        opacity: 1 !important; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #ff5959 !important;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
        color: #ff5959 !important;
    }

    .bs-wizard {
        margin-top: 40px;
    }


</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('index')}}"><i class="fa fa-home"
                                                         style="color: #3e3e3e;font-size:27px"></i></a>
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
                   style="width: 34px;height: 28px;background-color: #28a745;display: inline-block;color: white;">1</a>
                <p>مشخصات</p>
            </div>
            <div class="stepwizard-step">
                <a style="width: 34px;height: 28px;background-color: #aeaeae;display: inline-block;color: white;"
                   class="btn btn-default btn-circle" disabled="disabled">2</a>
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
            <h5 style="border-bottom: 1px dashed #c4c4c4;padding-bottom:12px;color: #7f8c9a"><i class="icon-check"></i>مشخصات
                تحویل گیرنده
            </h5>
        </div>
    </div>
    <br><br>
    <form class="form-horizontal" method="post" action="{{route('payment')}}">
        {{csrf_field()}}

        <div class="form-group row">
            <label class="control-label col-sm-2" for="name">نام تحویل گیرنده :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" autofocus
                       placeholder=" @if ($errors->has('name')) {{ $errors->first('name') }} @endif"
                       value="{{ old('name') }}">
            </div>
        </div>

        <div class="form-group row" style="margin-top:30px">
            <label class="control-label col-sm-2" for="mobile">تلفن همراه :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="mobile" name="mobile"
                       placeholder=" @if ($errors->has('mobile')) {{ $errors->first('mobile') }} @endif"
                       value="{{ old('mobile') }}">
            </div>
        </div>

        <div class="form-group row" style="margin-top:30px">
            <label class="control-label col-sm-2" for="address">نشانی :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address"
                       placeholder=" @if ($errors->has('address')) {{ $errors->first('address') }} @endif"
                       value="{{ old('address') }}">
            </div>
        </div>

        <div class="form-group row" style="margin-top:30px">
            <label class="control-label col-sm-2" for="address">موقعیت مکانی :</label>
            <div class="col-sm-10">
                <input id="latitude" type="text" name="lat" style="display: none"/>
                <input id="longitude" type="text" name="lon" style="display: none"/>
                <div id="map" style="margin:20px auto;"></div>
                <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
                <script>
                    var tileLayer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: ' <a href="http://www.far30tech.ir">بهینه شده توسط تیم فارسیتک</a> '
                    });

                    var rememberLat = document.getElementById('latitude').value;
                    var rememberLong = document.getElementById('longitude').value;
                    if (!rememberLat || !rememberLong) {
                        rememberLat = 35.69961659925912;
                        rememberLong = 51.458845138549805;
                    }
                    var map = new L.Map('map', {
                        'center': [rememberLat, rememberLong],
                        'zoom': 16,
                        'layers': [tileLayer]
                    });
                    var marker = L.marker([rememberLat, rememberLong], {
                        draggable: true
                    }).addTo(map);
                    marker.on('dragend', function (e) {
                        updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
                    });
                    map.on('click', function (e) {
                        marker.setLatLng(e.latlng);
                        updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
                    });

                    function updateLatLng(lat, lng, reverse) {
                        if (reverse) {
                            marker.setLatLng([lat, lng]);
                            map.panTo([lat, lng]);
                        } else {
                            document.getElementById('latitude').value = marker.getLatLng().lat;
                            document.getElementById('longitude').value = marker.getLatLng().lng;
                            map.panTo([lat, lng]);
                        }
                    }
                </script>
            </div>
        </div>

        <div class="form-group" style="margin-bottom:100px">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success" style="float: left">ادامه ثبت سفارش</button>
            </div>
        </div>
    </form>
</div>

<script src='/js/jquery-2.1.1.min.js'></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
