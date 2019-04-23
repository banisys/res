@extends('layouts.admin')

@section('content')
    <style>
        @media screen and (max-width: 768px) {
            #title {
                margin-right: 20px !important;
                margin-bottom: 15px !important;
            }
        }


        @media (min-width: 992px) {
            .col-md-2 {
                width: 9.666667%;
            }

        }

        #fileUpload {
            display: none;
        }

        @media screen and (min-width: 1200px) {
            #dfg {
                margin-right: 10px !important;
            }
        }

        @media screen and (max-width: 990px) {
            label {
                margin-bottom: 10px !important;
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
                <h3 id="title" style="margin: 0 0"><i class="icon-plus" style="vertical-align: middle"></i> افزودن مورد
                    جدید </h3>
            </div>
        </div>
    </div>

    <br>
    <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
          action="{{route('food.store')}}">
        {{csrf_field()}}
        <div class="container-fluid" id="dfg">
            <div class="col-md-12 ">
                <div class="row" style="margin-top:30px">


                    <div class="form-group">
                        <label class="control-label col-md-2" for="cat">دسته:</label>
                        <div class="col-md-4">
                            <select class="form-control" name="cat" id="cat">
                                <option value=""> --- لطفا انتخاب کنید ---</option>
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
                            <input id="field-b" name="name" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="field-b">قیمت:</label>
                        <div class="col-md-4">
                            <input id="field-b" name="price" type="number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:25px">
                    <div class="form-group">

                        <label class="col-md-2 col-xs-3 control-label" for="exampleCheck1">پیشنهاد ویژه:</label>
                        <div class="col-md-4 col-xs-4">
                            <input type="checkbox" value="1" id="exampleCheck1" name="offer" class="form-check-input"
                                   style="vertical-align: bottom;">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:25px">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-3 control-label" for="best">تصویر:</label>
                        <div class="col-sm-4 col-xs-5">
                            <input type="file" name="image" id="fileUpload">
                            <div class="btn btn-info btn-x button" id="customButton"
                                 style="height: 35px;"><i class=" icon-picture"></i>   تصویر
                            </div>
                            <span id="fileName" style="margin: 33px 15px 0 0;color: #00abea;"></span>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:35px;margin-right:90px;margin-bottom:70px">
                    <div class="col-md-10">
                        <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">افزودن</button>
                        <button class="btn btn-danger" type="reset"> لغو</button>
                    </div>
                </div>
            </div>
        </div>
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
    </script>

    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(2)").addClass("active");
            $(".sidebar-menu>li:nth-child(2) li:nth-child(2)").addClass("active");
        });
    </script>

@endsection