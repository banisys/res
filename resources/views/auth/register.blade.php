<!DOCTYPE html>
<html lang="fa">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Website CSS style -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <title>ثبت نام</title>
</head>
<body>
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background:#cbcbb0;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #676739;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background:#676739;
    }
</style>
<style>

    @media screen and (max-width: 990px) {
.main-center{width: 100%!important;}
    }
    #playground-container {
        height: 500px;
        overflow: hidden !important;
        -webkit-overflow-scrolling: touch;
    }
    body, html{
        background: #CCCCB2;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #757519, #CCCCB2);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #757519, #CCCCB2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .main{
        margin:50px 15px;
    }

    h1.title {
        font-size: 50px;
        font-family: 'Passion One', cursive;
        font-weight: 400;
    }

    hr{
        width: 10%;
        color: #fff;
    }

    .form-group{
        margin-bottom: 15px;
    }

    label{
        margin-bottom: 15px;
    }

    input,
    input::-webkit-input-placeholder {
        font-size: 11px;
        padding-top: 3px;
        direction: rtl;
    }

    .main-login{
        background-color: #fff;
        /* shadows and rounded borders */
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

    }
    .form-control {
        height: auto!important;
        padding: 8px 12px !important;
    }
    .input-group {
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
        -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
        box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    }
    #button {
        border: 1px solid #ccc;
        margin-top: 28px;
        padding: 6px 12px;
        color: #666;
        background-color:#828252;
        color: white;
        cursor: pointer;
        border-radius: 3px 3px;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
    }
    .main-center{
        margin-top: 30px;
        margin: 0 auto;
        width: 45%;
        padding: 10px 40px;
        background:#828252;
        color: #FFF;
        text-shadow: none;
        -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
        -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
        box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

    }
    span.input-group-addon i {
        color:#828252;
        font-size: 17px;
    }

    .login-button{
        margin-top: 5px;
    }

    .login-register{
        font-size: 11px;
        text-align: center;
    }
    ::placeholder {
        color: #828252 !important;
    }

    .form-control:focus {


        border-color: #ffffff!important;

        box-shadow: 0 0 0 0.2rem rgb(202, 202, 202)!important;
    }
</style>
<div class="container">
    <div class="row main">
        <div class="main-login main-center" style="width: 40%">
            <span style="">.اگر قبلا با ایمیل ثبت‌نام کرده‌اید، از <a href="{{route('login')}}"
                                                                      style="cursor: pointer;border-bottom: 1px dashed #EBEBEB;color: #EBEBEB">اینجا</a> وارد شوید</span>
            <br><br>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}"
                  aria-label="{{ __('Register') }}">
                @csrf


                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">: نام</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text"
                                   placeholder="@if ($errors->has('name')) {{ $errors->first('name') }} @endif"
                                   id="name"
                                   class="err form-control form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name" value="{{ old('name') }}" autofocus>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label"> : ایمیل</label>
                    <div class="cols-sm-10">
                        <div class="input-group">

                            <input type="text"
                                   placeholder="@if ($errors->has('email')) {{ $errors->first('email') }} @endif"
                                   name="email" id="email"
                                   class="err form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">: نام کاربری</label>
                    <div class="cols-sm-10">
                        <div class="input-group">

                            <input type="text" class="form-control mobile err" id="input-lastname"
                                   placeholder="@if ($errors->has('nickname')) {{ $errors->first('nickname') }} @endif"
                                   name="nickname">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">: کلمه عبور</label>
                    <div class="cols-sm-10">
                        <div class="input-group">

                            <input type="password"
                                   placeholder="@if ($errors->has('password')) {{ $errors->first('password') }} @endif"
                                   id="password"
                                   class="err form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">: تایید کلمه عبور</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password-confirm"
                                   name="password_confirmation">
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">ثبت نام</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>

