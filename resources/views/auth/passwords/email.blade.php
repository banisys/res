@extends('layouts.front')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
<style>
    #email::placeholder{color: red}
</style>

    <div class="col-sm-12">
        <div class="panel panel-default" style="width: 635px;margin: 43px 360px 50px 0;height: 94px;">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-lock"></i> یادآوری کلمه عبور</h4>
            </div>
            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                @csrf
                <div class="panel-body">
                    <label for="input-coupon" class="col-sm-3 control-label"> پست الکترونیکی </label>
                    <div class="input-group" style="right: 70px;top: -8px;">
                        <input placeholder="@if ($errors->has('email')) {{ $errors->first('email') }} @endif" style="width: 290px;"
                               id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email">

                        <span class="input-group-btn" style="float: right;">
                          <input type="submit" class="btn btn-primary"
                                 id="button-coupon" value="یادآوری" style="height: 34px;">
                    </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
