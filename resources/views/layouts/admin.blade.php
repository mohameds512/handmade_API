<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'appName') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <livewire:styles />
    @yield('meta')


</head>

<body class="sidebar-mini" style="height: auto;">


<div class="wrapper">


    @include('layouts._navbar')

   @include('layouts._sidebar')


    <div class="content-wrapper  " style="min-height: 404px;">

        @if (session('error'))
            <div class="alert alert-danger container">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success container">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="content-header ">
            <div class="container d-flex justify-content-between">
              @yield('content_header')
            </div>
        </div>




        <div class="content">
            <div class="container-fluid">

                @yield('content')
            </div>
        </div>

    </div>


    <div id="sidebar-overlay"></div>
</div>



<!-- Livewire Scripts -->

<livewire:scripts />

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@stack('js')
<!-- Alpine v3 -->

<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message']);
    });
</script>

</body>
</html>
