<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expanding Column Layout</title>
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/css/stylesheet.css">

</head>
<body>
<style>
    #xxx > li {
        margin-left: 30px;
    }

    #xxx > li > a {
        font-size: 14px;
        color: #828282;
    }
</style>

<br><br>
    <?php
    $MerchantID = 'a7db88a2-c655-11e8-9ab7-000c295eb8fc';
    $Amount = session()->get('amount');
    $Authority = $_GET['Authority'];

    if ($_GET['Status'] == 'OK') {

    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentVerification([
        'MerchantID' => $MerchantID,
        'Authority' => $Authority,
        'Amount' => $Amount,
    ]);

    if ($result->Status == 100) {

    session()->put('refid', $result->RefID);
    ?>
    <div class="container">
        <div class="row" style="height:150px">
            <div class="col-sm-12" id="content" style="margin-top: 30px;">
                <div class="alert alert-success" role="alert">
                    پرداخت شما با موفقیت انجام شد.
                    <br>
                    شناسه پرداخت شما:
                    <br>
                    {{$result->RefID}}
                </div>
                <div class="buttons" style="float: left">
                    <div class="pull-right">
                        <a href="{{route('finish.online')}}" class="btn btn-primary">ادامه ثبت سفارش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    } else {
    ?>
    <div class="container">
        <div class="row" style="height:150px">
            <div class="col-sm-12" id="content" style="margin-top: 30px;">
                <div class="alert alert-danger" role="alert">
                    پرداخت انجام نشد.
                </div>
                <div class="buttons" style="float: left">
                    <div class="pull-right">
                        <a href="{{route('index')}}" class="btn btn-primary">بازگشت به صفحه اصلی</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    } else {
    ?>
    <div class="container">
        <div class="row" style="height:150px">
            <div class="col-sm-12" id="content" style="margin-top: 30px;">

                    <div class="alert alert-danger" role="alert">
                        پرداخت توسط شما لغو گردید.
                    </div>
                    <div class="buttons" style="float: left">
                        <div class="pull-right">
                            <a href="{{route('index')}}" class="btn btn-primary">بازگشت به صفحه اصلی</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</body>
</html>
