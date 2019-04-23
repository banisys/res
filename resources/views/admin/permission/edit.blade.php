@extends('layouts.admin')
@section('content')
    <style>
        @media screen and (max-width: 990px) {
            label {
                margin-bottom: 10px !important;
            }
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

            <div class="col-md-12">
                <h3 id="title" style="margin: 0 0"><i class="icon-edit" style="vertical-align: middle"></i>
                    ویرایش دسترسی
                </h3>
            </div>

        </div>
    </div>
    <br>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" action="{{ route('permission.update',['id'=>$permission->id]) }}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class=" col-md-1 control-label" >نام :</label>
                    <div class="col-md-3">
                        <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 control-label">عنوان :</label>
                    <div class="col-md-3">
                        <input type="text" name="brand" class="form-control" value="{{ $permission->title }}">
                    </div>
                </div>
                <div class="col-lg-offset-2 col-lg-10">
                    <button style="margin-left: 8px;" class="btn btn-success btn-x" type="submit">ذخیره</button>
                    <a class="btn btn-danger" href="{{route('permission.index')}}"> لغو</a>
                </div>
            </form>
        </div>
@endsection