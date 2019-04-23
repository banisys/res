@extends('layouts.admin')
@section('content')
    <style>
        .table-striped > tbody > tr:nth-child(even) {
            background-color: rgba(42, 53, 66, 0.11);
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

    </style>
    <header class="header" style="width: 100px">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"
                 style="color: #cfd4da"></div>
        </div>
    </header>
    <section class="panel">


        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-4">
                    <h3 id="title" style="margin: 0 0"><i class="icon-tags"></i>
                        تنظیمات دسته ها
                    </h3>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><i class="icon-tag"></i> نام</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <form action="{{route('cat.store',['cat'=>$cat[0]->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <td>
                        <input class="form-control" style="padding-right: 5px;width:146px;color: #797979" type="text"
                               name="name" placeholder="نام دسته"
                               value="{{$cat[0]->name}}">
                    </td>
                    <td>
                        <input type="file" name="image" id="fileUpload" style="display:none">
                        <div class="btn btn-info btn-x button" id="customButton"
                             style="height: 35px;"><i class=" icon-picture"></i>  تصویر
                        </div>
                        <span id="fileName" style="margin: 33px 15px 0 0;color: #00abea;"></span>
                    </td>


                    <td>
                        <button type="submit" class="btn btn-success">ثبت</button>
                    </td>
                </form>
            </tr>
            <tr>
                <form action="{{route('cat.store',['cat'=>$cat[1]->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <td>
                        <input class="form-control" style="padding-right: 5px;width:146px;color: #797979" type="text"
                               name="name" placeholder="نام دسته"
                               value="{{$cat[1]->name}}">
                    </td>
                    <td>
                        <input type="file" name="image" id="fileUpload2" style="display:none">
                        <div class="btn btn-info btn-x button" id="customButton2"
                             style="height: 35px;"><i class=" icon-picture"></i> تصویر
                        </div>
                        <span id="fileName2" style="margin: 33px 15px 0 0;color: #00abea;"></span>
                    </td>


                    <td>
                        <button type="submit" class="btn btn-success">ثبت</button>
                    </td>
                </form>
            </tr>
            <tr>
                <form action="{{route('cat.store',['cat'=>$cat[2]->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <td>
                        <input class="form-control" style="padding-right: 5px;width:146px;color: #797979" type="text"
                               name="name" placeholder="نام دسته"
                               value="{{$cat[2]->name}}">
                    </td>
                    <td>
                        <input type="file" name="image" id="fileUpload3" style="display:none">
                        <div class="btn btn-info btn-x button" id="customButton3"
                             style="height: 35px;"><i class=" icon-picture"></i>  تصویر
                        </div>
                        <span id="fileName3" style="margin: 33px 15px 0 0;color: #00abea;"></span>
                    </td>


                    <td>
                        <button type="submit" class="btn btn-success">ثبت</button>
                    </td>
                </form>
            </tr>
            <tr>
                <form action="{{route('cat.store',['cat'=>$cat[3]->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <td>
                        <input class="form-control" style="padding-right: 5px;width:146px;color: #797979" type="text"
                               name="name" placeholder="نام دسته"
                               value="{{$cat[3]->name}}">
                    </td>
                    <td>
                        <input type="file" name="image" id="fileUpload4" style="display:none">
                        <div class="btn btn-info btn-x button" id="customButton4"
                             style="height: 35px;"><i class=" icon-picture"></i>  تصویر
                        </div>
                        <span id="fileName4" style="margin: 33px 15px 0 0;color: #00abea;"></span>
                    </td>


                    <td>
                        <button type="submit" class="btn btn-success">ثبت</button>
                    </td>
                </form>
            </tr>
            <tr>
                <form action="{{route('cat.store',['cat'=>$cat[4]->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <td>
                        <input class="form-control" style="padding-right: 5px;width:146px;color: #797979" type="text"
                               name="name" placeholder="نام دسته"
                               value="{{$cat[4]->name}}">
                    </td>
                    <td>
                        <input type="file" name="image" id="fileUpload5" style="display:none">
                        <div class="btn btn-info btn-x button" id="customButton5"
                             style="height: 35px;"><i class=" icon-picture"></i>  تصویر
                        </div>
                        <span id="fileName5" style="margin: 33px 15px 0 0;color: #00abea;"></span>
                    </td>


                    <td>
                        <button type="submit" class="btn btn-success">ثبت</button>
                    </td>
                </form>
            </tr>


            </tbody>
        </table>

    </section>
    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(4)").addClass("active");
        });
    </script>
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

    <script type="text/javascript">
        document.getElementById("customButton2").addEventListener("click", function () {
            document.getElementById("fileUpload2").click();
        });

        document.getElementById("fileUpload2").addEventListener("change", function () {
            var fullPath = document.getElementById('fileUpload2').value;
            var fileName2 = fullPath.split(/(\\|\/)/g).pop();
            document.getElementById("fileName2").innerHTML = fileName2;
        }, false);
    </script>

    <script type="text/javascript">
        document.getElementById("customButton3").addEventListener("click", function () {
            document.getElementById("fileUpload3").click();
        });

        document.getElementById("fileUpload3").addEventListener("change", function () {
            var fullPath = document.getElementById('fileUpload3').value;
            var fileName2 = fullPath.split(/(\\|\/)/g).pop();
            document.getElementById("fileName3").innerHTML = fileName2;
        }, false);
    </script>

    <script type="text/javascript">
        document.getElementById("customButton4").addEventListener("click", function () {
            document.getElementById("fileUpload4").click();
        });

        document.getElementById("fileUpload4").addEventListener("change", function () {
            var fullPath = document.getElementById('fileUpload4').value;
            var fileName2 = fullPath.split(/(\\|\/)/g).pop();
            document.getElementById("fileName4").innerHTML = fileName2;
        }, false);
    </script>

    <script type="text/javascript">
        document.getElementById("customButton5").addEventListener("click", function () {
            document.getElementById("fileUpload5").click();
        });

        document.getElementById("fileUpload5").addEventListener("change", function () {
            var fullPath = document.getElementById('fileUpload5').value;
            var fileName2 = fullPath.split(/(\\|\/)/g).pop();
            document.getElementById("fileName5").innerHTML = fileName2;
        }, false);
    </script>
@endsection