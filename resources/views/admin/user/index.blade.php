@extends('layouts.admin')
@section('content')
    <style>
        .table-striped > tbody > tr:nth-child(even) {
            background-color: rgba(42, 53, 66, 0.11);
        }
        .btn-xs {
            font-size: 15px
        }
        @media screen and (max-width: 768px) {

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
    </style>
    <header class="header" style="width: 100px">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips" style="color: #cfd4da"></div>
        </div>
    </header>
    <section class="panel">

        <div class="container">
            <div class="row">

                <div class="col-md-3 col-xs-12 col-sm-4">
                    <h3 id="title" style="margin: 0 0"><i class="icon-user"></i>
                        لیست کاربران
                    </h3>
                </div>

                <div class="col-md-9 col-xs-12 col-sm-8">
                    <form style="float: left" id="search">
                        <input class="form-control" style="width: 260px;display: unset" type="text" name="email"
                               placeholder="جستجو بر اساس ایمیل">

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
                <th><i class="icon-user"></i> نام کاربر</th>
                <th><i class="icon-envelope-alt"></i> ایمیل</th>

                <th><i class="icon-calendar"></i> تاریخ ثبت نام</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{  Verta::instance($user->created_at)->format('Y/n/j')  }}</td>
                    <td>
                        <a class="btn btn-success btn-xs" href="{{route('user.edit',['id'=>$user->id])}}"> سطح
                            دسترسی</a>
                    </td>


                    <td>
                        <form action="{{route('user.destroy',['id'=>$user->id])}}" method="post">
                            {{ method_field('delete') }}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger btn-xs">حذف</button>
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
    <div class="text-center">
        {{$users->links()}}
    </div>

    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(6)").addClass("active");
            $(".sidebar-menu>li:nth-child(6) li:nth-child(1)").addClass("active");
        });
    </script>
@endsection