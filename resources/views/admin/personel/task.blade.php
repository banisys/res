@extends('layouts.admin')
@section('content')
    <style>
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
    </style>
    <header class="header" style="width: 100px">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"
                 style="color: #cfd4da"></div>
        </div>
    </header>



    <div class="container">
        <div class="row" style="border-bottom: 1px dashed #cccccc;padding-bottom: 10px;">
            <div class="col-md-12 ">
                <h3 id="title" style="margin: 0 0"><i class="icon-gears" style="vertical-align: middle"></i> مدیریت نقش
                    ها</h3>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <form class="form-horizontal tasi-form" action="{{route('task.store')}}">
                <div class="row" style="margin-top:30px">
                    <div class="form-group" id="asd">
                        <label class="control-label col-md-1" for="field-b">نقش جدید :</label>
                        <div class="col-md-2" id="qwe">
                            <input id="field-b" name="name" type="text" class="form-control">
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
    @if(isset($tasks))
        <table class="table table-striped">
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->name}}</td>
                    <td>
                        <form action="{{route('task.destroy',['id'=>$task->id])}}" method="post">
                            {{ method_field('delete') }}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger btn-xs"> حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif

    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(5)").addClass("active");
            $(".sidebar-menu>li:nth-child(5) li:nth-child(3)").addClass("active");
        });
    </script>

@endsection