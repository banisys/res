@extends('layouts.admin')
@section('content')
    <style>
        .table-striped > tbody > tr:nth-child(even) {
            background-color: rgba(42, 53, 66, 0.11);
        }

        .btn-xs {
            font-size: 15px
        }
    </style>
    <style>
        @media (min-width: 992px) {
            .col-md-2 {
                width: 9.666667%;
            }
        }

        #fileUpload {
            display: none;
        }
        @media screen and (max-width: 768px) {
            #title {
                margin-right: 20px !important;
                margin-bottom: 15px !important;
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
                <h3 id="title" style="margin: 0 0"><i class="icon-edit" style="vertical-align: middle"></i>
                    ویرایش {{ $food->name }}</h3>
            </div>
        </div>
    </div>

    <form class="form-horizontal tasi-form" method="post" action="{{route('food.update',['id'=> $food->id])}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="container">
            <div class="row" style="margin-top:30px">
                <div class="form-group">
                    <label class="control-label col-md-2" for="cat">دسته:</label>
                    <div class="col-md-4">
                        <select class="form-control" name="cat" id="cat">
                            <option value="{{$food->cat}}" {{"selected"}}>{{$food->cat}}</option>
                            @foreach($cats as $cat)
                                <option value="{{$cat->name}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:30px">
                <div class="form-group">
                    <label class="control-label col-md-2" for="field-b">نام:</label>
                    <div class="col-md-4">
                        <input id="field-b" name="name" type="text" class="form-control" value="{{$food->name}}">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:30px">
                <div class="form-group">
                    <label class="control-label col-md-2" for="field-b">قیمت:</label>
                    <div class="col-md-4">
                        <input id="field-b" name="price" type="number" class="form-control"
                               value="{{$food->price}}">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:25px">
                <div class="form-group">

                    <label class="col-md-2 col-sm-2 col-xs-4 control-label" for="exampleCheck1">پیشنهاد ویژه:</label>
                    <div class="col-md-4 col-sm-4 col-xs-8">
                        <input type="checkbox" value="1" id="exampleCheck1"
                               name="offer" class="form-check-input"
                               style="vertical-align: bottom;" @if($food->offer==1) {{'checked'}} @endif>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:20px;margin-right:90px;margin-bottom:70px">
                <div class="col-md-10">
                    <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">افزودن</button>
                    <button class="btn btn-danger" type="reset"> لغو</button>
                </div>
            </div>
        </div>
    </form>

    <style>
        #fileUpload {
            display: none;
        }
    </style>
    <header class="panel-heading"
            style="margin: 5px 10px 0 0;border-bottom: 1px dashed #cbcbcb;padding-bottom:8px;width:100%;">
        <div style="width:100%;height:60px;display : flex;flex-direction: row;">
            <h3 style="font-weight:bold;margin-bottom: 0;"><i class="icon-edit" style="vertical-align: middle"></i>
                تصویر شاخص </h3>
        </div>
    </header>
    <form class="form-horizontal tasi-form general_lap" method="post" enctype="multipart/form-data" id="form"
          action="{{route('food.store_thumbnail',['image'=>$food->id])}}" style="margin:0 -28px 0 0;">
        {{csrf_field()}}

        <input type="file" id="fileUpload" name="pic">
        <div class="btn btn-info btn-x button" id="customButton" style="height: 36px;margin: 20px 40px 0 0"><i
                    class=" icon-picture"></i> انتخاب تصویر
            شاخص
        </div>
        <span id="fileName" style="margin: 8px 11px 0 0;color: #00abea"></span>

        @if(isset($food->image))
            <div class="col-md-3 col-xs-10 col-sm-10" style="margin-right:70px;margin-bottom: 100px">
                <img style="display: block;margin: 15px auto;width:100%;height:auto;position: relative;border-radius: 5px"
                     src="{{$food->image}}">

                <a href="{{route('food.destroy_thumbnail',['image'=>$food->id])}}">
                    <span style="position: absolute;top:3px;left:-6px;color: #d43f40;font-size:35px" aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif

    </form>

    <script type="text/javascript">
        document.getElementById("customButton").addEventListener("click", function () {
            document.getElementById("fileUpload").click();  // trigger the click of actual file upload button
        });

        document.getElementById("fileUpload").addEventListener("change", function () {
            var fullPath = document.getElementById('fileUpload').value;
            var fileName = fullPath.split(/(\\|\/)/g).pop();  // fetch the file name
            document.getElementById("fileName").innerHTML = fileName;  // display the file name
        }, false);
        document.getElementById("fileUpload").onchange = function () {
            document.getElementById("form").submit();
        };
        ClassicEditor.create(document.querySelector('#editor'));
        $('#additional-field-model').duplicateElement({
            "class_remove": ".remove-this-field",
            "class_create": ".create-new-field"
        });
    </script>



@endsection
