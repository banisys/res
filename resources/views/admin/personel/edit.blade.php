@extends('layouts.admin')
@section('content')
    <style>
        .table-striped > tbody > tr:nth-child(even) {
            background-color: rgba(42, 53, 66, 0.11);
        }

        .btn-xs {
            font-size: 15px
        }

        input, select {
            color: #383838 !important;
        }

        @media (min-width: 992px) {
            .col-md-2 {
                width: 9.666667%;
            }
        }

        #fileUpload, #fileUpload2 {
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
                    <h3 id="title" style="margin: 0 0"><i class="icon-edit" style="vertical-align: middle"></i>   ویرایش {{ $personel->name }}</h3>
                </div>
            </div>
        </div>

            <form class="form-horizontal tasi-form" method="post"
                  action="{{route('personel.update',['id'=> $personel->id])}}">
                {{csrf_field()}}

                <div class="container">

                    <div class="row" style="margin-top:30px">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="task">نقش :</label>
                            <div class="col-md-4">
                                <select class="form-control" name="task" id="task">
                                    <option value="{{$personel->task}}" {{"selected"}}>{{$personel->task}}</option>
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
                                <input id="field-b" name="name" type="text" class="form-control"
                                       value="{{$personel->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="dad">نام پدر :</label>
                            <div class="col-md-4">
                                <input id="dad" name="dad" type="text" class="form-control" value="{{$personel->dad}}">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="field-b">شماره ملی :</label>
                            <div class="col-md-4">
                                <input id="field-b" name="meli" type="number" class="form-control"
                                       value="{{$personel->meli}}">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="cel">شماره همراه :</label>
                            <div class="col-md-4">
                                <input id="cel" name="cel" type="number" class="form-control"
                                       value="{{$personel->cel}}">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="tel">شماره ثابت :</label>
                            <div class="col-md-4">
                                <input id="tel" name="tel" type="number" class="form-control"
                                       value="{{$personel->tel}}">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="address">آدرس :</label>
                            <div class="col-md-4">
                                <input id="address" name="address" type="text" class="form-control"
                                       value="{{$personel->address}}">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="supporter_name">نام معرف :</label>
                            <div class="col-md-4">
                                <input id="supporter_name" name="supporter_name" type="text"
                                       class="form-control" value="{{$personel->supporter_name}}">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="supporter_tel">شماره معرف :</label>
                            <div class="col-md-4">
                                <input id="supporter_tel" name="supporter_tel"
                                       type="number" class="form-control" value="{{$personel->supporter_tel}}">
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

            <header class="panel-heading" id="ttt"
                    style="margin: 5px 10px 0 0;border-bottom: 1px dashed #cbcbcb;padding-bottom:8px;width:100%;">
                <div style="width:100%;height:60px;display : flex;flex-direction: row;">
                    <h3 style="font-weight:bold;margin-bottom: 0;"><i class="icon-edit"
                                                                      style="vertical-align: middle"></i> تصاویر </h3>
                </div>
            </header>

            <div class="container-fluid">

                <div class="row" style="margin-top:30px">
                    <div class="col-md-12">
                        <form class="form-horizontal tasi-form general_lap" method="post" enctype="multipart/form-data"
                              id="form"
                              action="{{route('personel.store_image',['image'=>$personel->id])}}"
                              style="margin:0 -28px 0 0;">
                            {{csrf_field()}}

                            <input type="file" id="fileUpload" name="image">
                            <div class="btn btn-info btn-x button" id="customButton"
                                 style="height: 36px;margin: 20px 40px 0 0"><i
                                        class=" icon-picture"></i> انتخاب تصویر
                                پرسنلی
                            </div>
                            <span id="fileName" style="margin: 8px 11px 0 0;color: #00abea"></span>

                            @if(isset($personel->image))
                                <div class="col-md-3 col-xs-10 col-sm-10"
                                     style="margin-right:70px;margin-bottom: 100px">
                                    <a target="_blank" href="{{$personel->image}}">
                                        <img style="display: block;margin: 15px auto;width:100%;height:auto;position: relative;border-radius: 5px"
                                             src="{{$personel->image}}">
                                    </a>
                                    <a href="{{route('personel.destroy_image',['image'=>$personel->id])}}">
                            <span style="position: absolute;top:3px;left:-6px;color: #d43f40;font-size:35px"
                                  aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal tasi-form general_lap" method="post" enctype="multipart/form-data"
                              id="form2"
                              action="{{route('personel.store_scan',['scan'=>$personel->id])}}"
                              style="margin:0 -28px 0 0;">
                            {{csrf_field()}}

                            <input type="file" id="fileUpload2" name="scan">
                            <div class="btn btn-info btn-x button" id="customButton2"
                                 style="height: 36px;margin: 20px 40px 0 0"><i
                                        class=" icon-picture"></i> انتخاب اسکن
                                کارت ملی
                            </div>
                            <span id="fileName2" style="margin: 8px 11px 0 0;color: #00abea"></span>

                            @if(isset($personel->scan))
                                <div class="col-md-3 col-xs-10 col-sm-10"
                                     style="margin-right:70px;margin-bottom: 100px">
                                    <a target="_blank" href="{{$personel->scan}}">
                                        <img style="display: block;margin: 15px auto;width:100%;height:auto;position: relative;border-radius: 5px"
                                             src="{{$personel->scan}}">
                                    </a>
                                    <a href="{{route('personel.destroy_scan',['scan'=>$personel->id])}}">
                            <span style="position: absolute;top:3px;left:-6px;color: #d43f40;font-size:35px"
                                  aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

            </div>

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
            <script type="text/javascript">
                document.getElementById("customButton2").addEventListener("click", function () {
                    document.getElementById("fileUpload2").click();
                });

                document.getElementById("fileUpload2").addEventListener("change", function () {
                    var fullPath = document.getElementById('fileUpload2').value;
                    var fileName2 = fullPath.split(/(\\|\/)/g).pop();
                    document.getElementById("fileName2").innerHTML = fileName2;
                }, false);
                document.getElementById("fileUpload2").onchange = function () {
                    document.getElementById("form2").submit();
                };
                ClassicEditor.create(document.querySelector('#editor'));
                $('#additional-field-model').duplicateElement({
                    "class_remove": ".remove-this-field",
                    "class_create": ".create-new-field"
                });
            </script>
@endsection
