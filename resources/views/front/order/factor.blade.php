<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css"/>
    <link rel="stylesheet" href="/css/factor.css" media="all"/>
</head>
<body>
<header class="clearfix" style="width: 600px;margin: 0 auto ">
    <div id="logo">
        <h1 style="padding-top:10px;padding-bottom: 10px">فارسیتک</h1>
    </div>

    <div id="company" class="clearfix" style=" direction: ltr">
        <div>فارسیتک</div>
        <div>مطهری نبش کوه نور</div>
        <div>0912 325 59 17</div>

    </div>
    <div id="project">
        <div><span>تاریخ:</span> {{ Verta::instance(date("Y/m/d"))->format('Y/n/j') }}</div>
        <div><span>نام:</span> {{$order->name}}</div>
        <div><span>موبایل:</span> {{$order->mobile}}</div>
        <div><span>آدرس:</span> <?php  echo wordwrap($order->address,180,"<br>\n", false); ?></div>
    </div>
</header>
<main>
    <table style="border: 1px solid black;width: 600px;margin: 0 auto ">
        <thead style="border: 1px solid black;font-size: 15px;font-weight: bold">
        <tr style="border: 1px solid black">
            <th style="border: 1px solid black">نام محصول</th>
            <th style="border: 1px solid black">تعداد</th>
            <th style="border: 1px solid black">قیمت واحد(تومان)</th>
            <th style="border: 1px solid black">قیمت کل(تومان)</th>
        </tr>
        </thead>
        <tbody>
        <?php  $sum = 0 ?>
        @foreach($order->order_pro as $food)
            <tr>
                <td style="border: 1px solid black">{{$food->food->name}}</td>
                <td style="border: 1px solid black"> {{$food->num}}</td>
                <td style="border: 1px solid black">{{$food->food->price}}</td>
                <td style="border: 1px solid black">{{$food->food->price*$food->num}}</td>
                <?php $sum += $food->food->price * $food->num  ?>
            </tr>
        @endforeach
        </tbody>
    </table>

    <table style="border: 1px solid black;width: 184px;float: left;margin: 10px 0 0 50px">
        <tbody style="border: 1px solid black">
        <tr style="border: 1px solid black">
            <td style="border: 1px solid black">جمع کل:</td>
            <td style="border: 1px solid black">{{$sum}} تومان</td>
        </tr>
        </tbody>
    </table>

</main>
</body>
</html>