<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>عرض سعر</title>
    <style>
        body {
            direction: rtl;
            width: 210mm;
            height: 297mm;
            margin: auto;
        }
        /*header {*/
        /*    position: absolute;*/
        /*    top: 0;*/
        /*    text-align: center;*/
        /*    width: 100%;*/
        /*}*/
        .logo{
            height: 50mm ;
        }
        img{
            height: 100%;
        }
        section{
            font-size: 24px;
        }
        footer {
            white-space: pre-line;

        }

        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }

            /* ... the rest of the rules ... */
        }
    </style>
</head>
<body class="text-right">
<header class="nav">
    @if(setting('show_logo') == true)
        <div class="logo mx-auto">
            <img src="{{asset(setting('company_logo')) }}" alt="company logo">
        </div>
    @endif
</header>
<section class="mt-4">
    <h2 >السادة /   <span>{{$priceOffer->client->name}}</span></h2>
    <div class="text-center mb-5">تحیة طیبة وبعد،</div>
    <p> تتشرف مجموعة تاكو الصناعیة بعرض أسعار منتجاتھا من البودرة الالیكتروستاتیك</p>
    <table class="table  table-bordered table-striped " >
        <thead>
        <tr>
            <th>المنتج</th>
            <th>السعر</th>
        </tr>
        </thead>
        <tbody >
        @foreach($priceOffer->products as $product)
            <tr>
                {{--            <td>بودرة بولیستر بیج</td>--}}
                <td>{{$product->name}} @if($product->code) ( {{$product->code}} ) @endif</td>
                <td>{{$product->last_price}} جم</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($priceOffer->notes)
        {!!   nl2br($priceOffer->notes) !!}
    @else
        {!!   nl2br(setting('notes')) !!}
    @endif

</section>
<footer  class="footer text-center fixed-bottom">
    {{setting('footer')}}
</footer>
<script>
    window.print()
</script>
</body>
</html>

