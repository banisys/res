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
                <h3 id="title" style="margin: 0 0"><i class="icon-plus" style="vertical-align: middle"></i> افزودن پرسنل
                    جدید </h3>
            </div>
        </div>
    </div>

    <br>
    <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
          action="{{route('personel.store')}}">
        {{csrf_field()}}
        <div class="container-fluid" id="dfg">
            <div class="col-md-12 ">

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="task">نقش :</label>
                        <div class="col-md-4">
                            <select class="form-control" name="task" id="task">
                                <option value=""> --- لطفا انتخاب کنید ---</option>
                                @foreach($tasks as $task)
                                    <option value="{{$task->name}}">{{$task->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="field-b">نام :</label>
                        <div class="col-md-4">
                            <input id="field-b" name="name" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="dad">نام پدر :</label>
                        <div class="col-md-4">
                            <input id="dad" name="dad" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="field-b">شماره ملی :</label>
                        <div class="col-md-4">
                            <input id="field-b" name="meli" type="number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="cel">شماره همراه :</label>
                        <div class="col-md-4">
                            <input id="cel" name="cel" type="number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="tel">شماره ثابت :</label>
                        <div class="col-md-4">
                            <input id="tel" name="tel" type="number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="address">آدرس :</label>
                        <div class="col-md-4">
                            <input id="address" name="address" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="supporter_name">نام معرف :</label>
                        <div class="col-md-4">
                            <input id="supporter_name" name="supporter_name" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="supporter_tel">شماره معرف :</label>
                        <div class="col-md-4">
                            <input id="supporter_tel" name="supporter_tel" type="number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:25px">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-3 control-label" for="best">عکس پرسنلی :</label>
                        <div class="col-sm-4 col-xs-5">
                            <input type="file" name="image" id="fileUpload">
                            <div class="btn btn-info btn-x button" id="customButton"
                                 style="height: 35px;"><i class=" icon-picture"></i>
                                انتخاب

                            </div>
                            <span id="fileName" style="margin: 33px 15px 0 0;color: #00abea;"></span>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:25px">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-3 control-label" for="best">اسکن کارت ملی :</label>
                        <div class="col-sm-4 col-xs-5">
                            <input type="file" name="scan" id="fileUpload2" style="display: none">
                            <div class="btn btn-info btn-x button" id="customButton2"
                                 style="height: 35px;"><i class=" icon-picture"></i>
                                انتخاب

                            </div>
                            <span id="fileName2" style="margin: 33px 15px 0 0;color: #00abea;"></span>
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
            document.getElementById("fileUpload").click();
        });

        document.getElementById("fileUpload").addEventListener("change", function () {
            var fullPath = document.getElementById('fileUpload').value;
            var fileName = fullPath.split(/(\\|\/)/g).pop();  // fetch the file name
            document.getElementById("fileName").innerHTML = fileName;
        }, false);
    </script>
    <script type="text/javascript">
        document.getElementById("customButton2").addEventListener("click", function () {
            document.getElementById("fileUpload2").click();
        });

        document.getElementById("fileUpload2").addEventListener("change", function () {
            var fullPath = document.getElementById('fileUpload2').value;
            var fileName = fullPath.split(/(\\|\/)/g).pop();  // fetch the file name
            document.getElementById("fileName2").innerHTML = fileName;
        }, false);
    </script>
    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(5)").addClass("active");
            $(".sidebar-menu>li:nth-child(5) li:nth-child(2)").addClass("active");
        });
    </script>

@endsection