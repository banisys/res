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
                <h3 id="title" style="margin: 0 0"><i class="icon-plus" style="vertical-align: middle"></i>
                    افزودن دسترسی جدید
                </h3>
            </div>

        </div>
    </div>
    <br>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                  action="{{route('permission.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-1 control-label">نام :</label>
                    <div class="col-sm-3">
                        <input type="text" name="name" class="form-control khata"
                               placeholder=" @if ($errors->has('name')) {{ $errors->first('name') }} @endif"
                               value="{{ old('name') }}" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">عنوان :</label>
                    <div class="col-sm-3">
                        <input type="text" name="title" class="form-control khata"
                               placeholder="@if ($errors->has('title')) {{ $errors->first('title') }} @endif"
                               value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-10">
                    <button style="margin-left: 8px;" class="btn btn-success btn-x" type="submit">ذخیره</button>
                    <button class="btn btn-danger" type="reset"> لغو</button>
                </div>
            </form>
        </div>
        @if(Session::has('store'))
            <div class="alert alert-success" style="margin-top: 10px;">
                مورد با موفقیت ثبت شد.
            </div>
        @endif


@endsection