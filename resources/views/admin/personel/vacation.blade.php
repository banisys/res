@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="/css/js-persian-cal.css">
    <script src="/js/js-persian-cal.min.js"></script>
    <style>
        .pcalBtn {
            background-image: url("/image/calendar.png") !important;
            width: 29px !important;
            height: 29px !important;
        }

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
            label, #qwe {
                margin-bottom: 10px !important;
            }
        }

        @media screen and (max-width: 1400px) {
            #asd {
                margin-right: 15px !important;
            }
        }

        @media screen and (min-width: 990px) {
            #zxc {
                margin-right: 40px !important;
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

        label {
            margin-left: -4% !important
        }
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
                <h3 id="title" style="margin: 0 0">
                    <i class="icon-gears" style="vertical-align: middle">
                    </i> مرخصی
                    های {{$personel->name}}</h3>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <form class="form-horizontal tasi-form" method="post"
                  action="{{route('vacation.store',['id'=>$personel->id])}}">
                {{csrf_field()}}
                <div class="row" style="margin-top:30px">
                    <div class="form-group" id="asd">
                        <label class="control-label col-md-1" for="pcal1">تاریخ :</label>
                        <div class="col-md-2" id="qwe">
                            <input name="date" type="text" class="form-control pdate inline-block" id="pcal1"
                                   style="width: 80%;">
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
    @if(isset($vacations))
        <table class="table table-striped">
            <tbody>
            @foreach($vacations as $vacation)
                <tr>
                    <td>{{$vacation->date}}</td>
                    <td>
                        <form action="{{route('vacation.destroy',['id'=>$vacation->id])}}" method="post">
                            {{ method_field('delete') }}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger btn-xs"> حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
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
                    {{$vacations->links()}}
                </div>
            </div>
        </div>
    @endif
    <br>
    <div class="container">
        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-12">
                <i class="icon-calendar" style="font-size:17px;"></i>&nbsp;
                <span style="font-size:25px;"> آمار مرخصی ها </span>
            </div>
        </div>
        <br>
        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">فروردین</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($farvardins as $farvardin)

                    <?php if ($farvardin->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">اردیبهشت</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($ordibeheshts as $ordibehesht)

                    <?php if ($ordibehesht->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">خرداد</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($khordads as $khordad)

                    <?php if ($khordad->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">تیر</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($tirs as $tir)

                    <?php if ($tir->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">مرداد</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($mordads as $mordad)

                    <?php if ($mordad->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">شهریور</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($shahrivars as $shahrivar)

                    <?php if ($shahrivar->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">مهر</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($mehrs as $mehr)

                    <?php if ($mehr->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">آبان</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($abans as $aban)

                    <?php if ($aban->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">آذر</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($azars as $azar)

                    <?php if ($azar->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">دی</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($deys as $dey)

                    <?php if ($dey->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">بهمن</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($bahmans as $bahman)

                    <?php if ($bahman->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-1 ">
                <h4 id="title">اسفند</h4>
            </div>
            <div class="col-md-11" style="margin-top:20px">
                @for($x = 1; $x < 32; $x++)
                    <span style="font-size:16px;border: 1px solid #cccccc; padding: 0 7px;display: inline-block;width:35px;
                text-align: center;border-radius:4px;margin-bottom:5px;
                    @foreach($esfands as $esfand)

                    <?php if ($esfand->day == $x) {
                        echo "background-color:#a9d86e;color:#ffff";
                    } ?>
                    @endforeach
                            ">{{$x}}</span>
                    @if($x==7 || $x==14 || $x==21 || $x==28) <br> @endif
                @endfor
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(4)").addClass("active");
        });
    </script>
    <script>
        var objCal1 = new AMIB.persianCalendar('pcal1');
    </script>

@endsection