@extends('layouts.admin')
@section('content')
    <style>
        .table-striped > tbody > tr:nth-child(even) {
            background-color: #e8e9ea;
        }

        @media screen and (max-width: 400px) {
            #vbn {
                width: 120px !important;
            }
        }

        @media screen and (max-width: 768px) {
            #add {
                display: none
            }

            #title {
                margin-right: 20px !important;
                margin-bottom: 15px !important;
            }

            #search {
                float: right !important;
            }

            #search > button {
                vertical-align: baseline;
            }
        }

        @media screen and (max-width: 946px) {

            #fgh{width: 115px!important;}
        }

        @media screen and (min-width: 1200px) {
            #zxc {
                margin-right: -120px !important;
            }
        }

        .btn-xs {
            font-size: 15px
        }

        #map, #container {
            height: 460px;
        }
    </style>


    <header class="header" style="width: 100px">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"
                 style="color: #cfd4da"></div>
        </div>
    </header>

    <div class="container">
        <div class="row">

            <div class="col-md-3 col-xs-12 col-sm-4">
                <h3 id="title" style="margin: 0 0"><i class="icon-check"></i>
                    لیست سفارشات
                </h3>
            </div>

            <div class="col-md-9 col-xs-12 col-sm-8">
                <form style="float: left" id="search">
                    <input class="form-control" style="width:165px;display: unset" type="text" name="factor_id"
                           placeholder="جستجو بر اساس شماره فاکتور">
                    <button class="btn btn-success" type="submit" style="padding:5px 6px">
                        <i class="icon-search" style="font-size: 18px;vertical-align: middle;"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th><i class="icon-list"></i> شماره فاکتور</th>
            <th><i class="icon-user"></i> سفارش دهنده</th>
            <th><i class=" icon-calendar"></i> تاریخ</th>
            <th><i class="icon-eye-open"></i> وضعیت</th>
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; ?>
        @foreach($orders as $order)
            <tr>
                <td style="color: <?php if ($order->read == 1) echo '#0c770e'; else echo '#e00000'; ?>">{{$order->factor_id}}</td>
                <td>{{$order->name}}</td>

                <td>{{ Verta::instance($order->created_at)->format('Y/n/j') }}</td>
                <td>
                    <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                          action="{{route('order.status',['order'=>$order->id])}}" id="my_form">
                        {{csrf_field()}}
                        <select name="status" style="padding-right:13px;width:146px;color: #797979" id="fgh"
                                class="form-control inline-block">
                            <option value="1" <?php if ($order->status == 1) echo "selected"?>>در صف بررسی</option>
                            <option value="2" <?php if ($order->status == 2) echo "selected"?>>آماده ارسال</option>
                            <option value="3" <?php if ($order->status == 3) echo "selected"?>>ارسال شد</option>
                            <option value="0" <?php if ($order->status == 0) echo "selected"?>>لغو شد</option>
                        </select>&nbsp;&nbsp;
                        <input type="submit" id="refresh" style="width:5px;height:21px;opacity:0;z-index: 5">
                        <a style="margin-right:-18px;"><i class="icon-refresh" style="color: #1c7430"></i></a>
                    </form>
                </td>
                <td>
                    <a href="{{route('map',['o'=>$order->id])}}" target="_blank" class="btn btn-info btn-xs">موقعیت مکان</a>
                </td>
                <td>
                    <a href="{{route('order.admin_factor',['o'=>$order->id])}}" target="_blank"
                       class="btn btn-success btn-xs">فاکتور</a>
                </td>

                <td>
                    <a href="{{route('order.destroy',['o'=>$order->id])}}" class="btn btn-danger btn-xs"> حذف</a>
                </td>
            </tr>
            <?php $x++; ?>
        @endforeach
        </tbody>
    </table>
    @if($x == 0)
        <div class="alert alert-danger" style="margin-top: 10px;">
            موردی یافت نشد
        </div>
    @endif

    <style>
        .pagination > .active > span {
            background-color: #78cd51;
            border-color: #78cd51;
        }

        .pagination {
            width: 100%
        }
    </style>





    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(3)").addClass("active");
        });
    </script>


@endsection