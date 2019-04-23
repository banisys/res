@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="/css/js-persian-cal.css">
    <script src="/js/js-persian-cal.min.js"></script>
    <style>
        .pcalBtn{background-image: url("/image/calendar.png")!important;
            width: 29px!important;
            height: 29px!important;}
        .table-striped > tbody > tr:nth-child(even) {
            background-color: #e8e9ea;
        }

        button {
            padding: 4px 10px !important;
            font-size: 16px !important;
        }

        @media screen and (max-width: 768px) {
            #title {
                margin-right: 20px !important;
                margin-bottom: 15px !important;
            }
        }
        @media screen and (max-width: 990px) {
            label,#qwe {
                margin-bottom: 10px !important;
            }
        }

        @media screen and (max-width: 1400px) {
            #asd {
                margin-right: 15px !important;
            }
        }

        @media screen and (min-width:990px) {
            #zxc {
                margin-right:40px !important;
            }
        }
        @media screen and (max-width: 768px) {

            #search {
                float: right !important;
            }

            #search > button {
                vertical-align: baseline;
            }
        }
        label{margin-left: -4% !important}
    </style>
    <header class="header" style="width: 100px">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"
                 style="color: #cfd4da"></div>
        </div>
    </header>



    <div class="container">
        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-3 ">
                <h3 id="title" style="margin: 0 0"><i class="icon-gears" style="vertical-align: middle"></i>  ریز دریافتی های {{$personel->name}}</h3>
            </div>

            <div class="col-md-9 col-xs-12 col-sm-7">
                <form style="float: left" id="search">

                    <input class="form-control" style="width: 140px;display: unset" type="text" name="date" id="vbn"
                           placeholder="جستجو بر اساس تاریخ">

                    <button class="btn btn-success" type="submit" style="padding:5px 6px">
                        <i class="icon-search" style="font-size: 18px;vertical-align: middle;"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <form class="form-horizontal tasi-form" method="post"
                  action="{{route('receive.store',['id'=>$personel->id])}}" >
                {{csrf_field()}}
                <div class="row" style="margin-top:30px">
                    <div class="form-group" id="asd">
                        <label class="control-label col-md-1" for="pcal1">تاریخ :</label>
                        <div class="col-md-2" id="qwe">
                            <input name="date" type="text" class="form-control pdate inline-block" id="pcal1" style="width: 80%;">
                        </div>
                        <label class="control-label col-md-1" for="amount" id="zxc">مبلغ :</label>
                        <div class="col-md-2" id="qwe">
                            <input id="amount" name="amount" type="number" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
<br><br>
    @if(isset($receives))
        <table class="table table-striped">
            <tbody>
            @foreach($receives as $receive)
                <tr>
                    <td>{{$receive->date}}</td>
                    <td>{{number_format($receive->amount)}}</td>
                    <td>
                        <form action="{{route('receive.destroy',['id'=>$receive->id])}}" method="post">
                            {{ method_field('delete') }}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger btn-xs"> حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        @if($x == 0)
            <div class="alert alert-danger" style="margin-top: 10px;">
                موردی یافت نشد
            </div>
        @endif
    @endif
    <style>
        .pagination > .active > span {
            background-color: #78cd51;
            border-color: #78cd51;
        }
        .pagination{width: 300px}
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-3 text-center">
                {{$receives->links()}}
            </div>
        </div>
    </div>
<br><br><br>
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <span style="text-align: center;font-size:30px">آمار دریافتی ها</span><span
                    style="font-size:20px"> (تومان) </span>
            <iframe style="border: none" src="{{route('statistics.chart.receive',['id'=>$personel->id])}}" height="450px"
                    width="100%"></iframe>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(4)").addClass("active");
        });
    </script>
    <script>
        var objCal1 = new AMIB.persianCalendar( 'pcal1' );
    </script>

@endsection