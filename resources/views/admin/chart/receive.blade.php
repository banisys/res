<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        @font-face {
            font-family: 'WYekan';
            src: url('/css/persian-fonts/WYekan.eot?#') format('eot'),
            url('/css/persian-fonts/WYekan.ttf') format('truetype');
        }

        @font-face {
            font-family: 'BKoodakBold';
            src: url('/css/persian-fonts/BKoodakBold.eot?#') format('eot'),
            url('/css/persian-fonts/BKoodakBold.woff') format('woff'),
            url('/css/persian-fonts/BKoodakBold.ttf') format('truetype');
        }

        body,div,canvas,span,p {
            font-family: 'WYekan', sans-serif;
            font-size: 15px;
        }
    </style>
</head>
<body>
<script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",

            data: [{
                type: "column",
                showInLegend: true,
                dataPoints: [
                    {y: @if(isset($farvardin)){{$farvardin}} @else 0  @endif, label: "فروردین"},
                    {y: @if(isset($ordibehesht)){{$ordibehesht}} @else 0  @endif, label: "اردیبهشت"},
                    {y: @if(isset($khordad)){{$khordad}} @else 0  @endif, label: "خرداد"},
                    {y: @if(isset($tir)){{$tir}} @else 0  @endif, label: "تیر"},
                    {y: @if(isset($mordad)){{$mordad}} @else 0  @endif, label: "مرداد"},
                    {y: @if(isset($shahrivar)){{$shahrivar}} @else 0  @endif, label: "شهریور"},
                    {y: @if(isset($mehr)){{$mehr}} @else 0  @endif, label: "مهر"},
                    {y: @if(isset($aban)){{$aban}} @else 0  @endif, label: "آبان"},
                    {y: @if(isset($azar)){{$azar}} @else 0  @endif, label: "آذر"},
                    {y: @if(isset($dey)){{$dey}} @else 0  @endif, label: "دی"},
                    {y: @if(isset($bahman)){{$bahman}} @else 0  @endif, label: "بهمن"},
                    {y: @if(isset($esfand)){{$esfand}} @else 0  @endif, label: "اسفند"}
                ]
            }]
        });
        chart.render();
    }
</script>


<div id="chartContainer"></div>
<script src="/js/canvasjs.min.js"></script>
</body>
</html>
