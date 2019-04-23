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
            .col-md-1 {
                width: 9.333333% !important;
            }
        }

        @media (min-width: 992px) {
            .col-md-2 {
                width: 9.666667%;
            }

        }

        @media screen and (max-width: 990px) {
            label {
                margin-bottom: 10px !important;
            }
        }

        @media screen and (min-width: 1200px) {
            #dfg {
                margin-right: 10px !important;
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
                    افزودن سطح دسترسی جدید
                </h3>
            </div>

        </div>
    </div>
    <br>

    <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
          action="{{route('role.store')}}">
        {{csrf_field()}}
        <div class="container-fluid" id="dfg">
            <div class="col-md-12">

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-2 col-md-1">نام :</label>
                        <div class="col-sm-5 col-md-4 col-xs-12">
                            <input type="text" name="name" class="form-control khata"
                                   placeholder=" @if ($errors->has('name')) {{ $errors->first('name') }} @endif"
                                   value="{{ old('name') }}" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-2 col-md-1">عنوان :</label>
                        <div class="col-sm-5 col-md-4 col-xs-12">
                            <input type="text" name="title" class="form-control khata"
                                   placeholder="@if ($errors->has('title')) {{ $errors->first('title') }} @endif"
                                   value="{{ old('title') }}">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px">
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-2 col-md-1">دسترسی ها :</label>
                        <div class="col-sm-5 col-md-4 col-xs-12">
                            <select name="permission_id[]" style="width:100%;padding-right:4px;padding-top: 3px" multiple>
                                @foreach($permissions  as $permission)
                                    <option value="{{$permission->id}}">
                                        {{$permission->title}}
                                    </option>
                                @endforeach
                            </select>
                            <p style="margin-top:7px;color:#a0a0a0;margin-right:5px">برای انتخاب چند مورد از کلید Ctrl
                                استفاده
                                کنید.</p>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:35px;margin-right:90px;margin-bottom:70px">
                    <div class="col-md-10">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">افزودن</button>
                            <button class="btn btn-danger" type="reset"> لغو</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if(Session::has('store'))
        <div class="alert alert-success" style="margin-top: 10px;">
            مورد با موفقیت ثبت شد.
        </div>
    @endif

@endsection