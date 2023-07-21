<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Status</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap");

        * {
            padding: 0;
            margin: 0;
        }

        html {
            font-family: "Roboto", sans-serif;
            font-size: 12px;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background: #1488cc;
            background: -webkit-linear-gradient(to right, #2b32b2, #1488cc);
            background: linear-gradient(to right, #2b32b2, #1488cc);
        }

        .blog_post {
            background: #fff;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
            position: relative;
        }


        .container_copy {
            padding: 6rem 4rem 5rem 4rem;
        }

        .img_pod {
            height: 110px;
            width: 110px;
            background: linear-gradient(90deg, #ff9966, #ff5e62);
            z-index: 10;
            box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
            border-radius: 100%;
            position: absolute;
            left: -10%;
            top: -13%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        img {
            height: 8.3rem;
            width: 8.3rem;
            position: relative;
            border-radius: 100%;
            box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        h3 {
            margin: 0 0 0.5rem 0;
            color: #999;
            font-size: 1.25rem;
        }

        h1 {
            margin: 0 0 1rem 0;
            font-size: 2.5rem;
            letter-spacing: 0.5px;
            color: #333;
        }

        p {
            margin: 0 0 4.5rem 0;
            font-size: 1.5rem;
            line-height: 1.45;
            color: #333;
        }

        .btn_primary {
            border: none;
            outline: none;
            background: linear-gradient(90deg, #ff9966, #ff5e62);
            padding: 1.5rem 2rem;
            border-radius: 50px;
            color: white;
            font-size: 1.2rem;
            box-shadow: 1px 10px 2rem rgba(255, 94, 98, 0.5);
            transition: all 0.2s ease-in;
            text-decoration: none;
        }

        .btn_primary:hover {
            box-shadow: 0px 5px 1rem rgba(255, 94, 98, 0.5);
        }

        @media only screen and (max-width: 650px) {
            body {
                background-color: black;
            }

            .img_pod {

            }
        }

    </style>
</head>
<body>

<div class="blog_post">
    <div class="img_pod">

        <img src=" {{ asset('img/logos/logo.jpg') }}" alt="University Logo">
    </div>
    <div class="container_copy">
        <h3>Requested at : {{$data->created_at}}</h3>
        <h1> Certificates Request
        @if($data->service)
            {{$data->service->name}}
        @endif
        </h1>
        <p>
            @if($data->status == 0)
                Under Review , you will get updated through this mail <span style="color: lightseagreen">{{$data->email}}</span>

            @elseif($data->status==\App\Models\Services\Certificate::STATUS_REJECTED)
                Unfortunately , Your request is rejected
            @else
                Approved and Working on it, you will get updated through this mail <span style="color: lightseagreen">{{$data->email}}</span>
            @endif


        </p>
    </div>

</div>

</body>
</html>
