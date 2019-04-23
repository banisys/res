@extends('layouts.admin')
@section('content')
    <style>
        .table-striped > tbody > tr:nth-child(even) {
            background-color: rgba(42, 53, 66, 0.11);
        }

        .btn-xs {
            font-size: 15px
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

        @media screen and (min-width: 1200px) {
            #zxc {
                margin-right: -120px !important;
            }
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

            <div class="col-md-3 col-xs-12 col-sm-3">
                <h3 id="title" style="margin: 0 0"><i class="icon-user"></i>
                    لیست پرسنلین
                </h3>
            </div>

            <div class="col-md-2 col-xs-12 col-sm-2" id="add">
                <a class="btn btn-success" href="{{route('personel.create')}}" id="zxc"
                   style="font-size: 15px;padding:2px 12px;margin-top: 3px">
                    <i class="icon-plus" style="vertical-align: middle"></i> افزودن مورد جدید
                </a>
            </div>

            <div class="col-md-7 col-xs-12 col-sm-7">
                <form style="float: left" id="search">

                    <input class="form-control" style="width: 140px;display: unset" type="text" name="name" id="vbn"
                           placeholder="جستجو بر اساس نام">

                    <input class="form-control" style="width: 140px;display: unset" type="text" name="task"
                           placeholder="جستجو بر اساس نقش">
                    <button class="btn btn-success" type="submit" style="padding:5px 6px">
                        <i class="icon-search" style="font-size: 18px;vertical-align: middle;"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
    <br>    <br>
    <section class="panel">

        <table class="table table-striped">
            <thead>
            <tr>
                <th><i class="icon-tag"></i> نام</th>
                <th><i class="icon-bookmark"></i> نقش </th>

            </tr>
            </thead>
            <tbody>
            @foreach($personels as $personel)
                <tr>
                    <td>{{$personel->name}}</td>
                    <td>{{$personel->task}}</td>
                    <td>
                        <a href="{{route('receive.create',['id'=>$personel->id])}}" class="btn btn-info btn-xs"> دریافتی </a>
                    </td>
                    <td>
                        <a href="{{route('overtime.create',['id'=>$personel->id])}}" class="btn btn-info btn-xs"> اضافه کار </a>
                    </td>
                    <td>
                        <a href="{{route('vacation.create',['id'=>$personel->id])}}" class="btn btn-info btn-xs"> مرخصی </a>
                    </td>
                    <td>
                        <a href="{{route('delay.create',['id'=>$personel->id])}}" class="btn btn-info btn-xs"> تاخیر </a>
                    </td>
                    <td>
                        <a href="{{route('absent.create',['id'=>$personel->id])}}" class="btn btn-info btn-xs"> غیبت </a>
                    </td>
                    <td>
                        <a href="{{route('personel.edit',['id'=>$personel->id])}}" class="btn btn-success btn-xs"> ویرایش </a>
                    </td>
                    <td>
                        <form action="{{route('personel.destroy',['id'=>$personel->id])}}" method="post">
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

    </section>
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
                {{$personels->links()}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(5)").addClass("active");
            $(".sidebar-menu>li:nth-child(5) li:nth-child(1)").addClass("active");
        });
    </script>
@endsection