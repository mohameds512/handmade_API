<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('home') }}">appName</a>
{{--    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                        @foreach($links as $link)
                        <li class="nav-item">
                            <a class="nav-link" href="#{{ $link }}">
                                {{$link}}
                                <i class="bx bx-{{$link}} bx-sm"></i>
                            </a>
                        </li>
                        @endforeach
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

            <h2>Api Documentation </h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Route</th>
                        <th>Methods</th>
                        <th>Controller</th>
                        <th>Params</th>
                        <th>Response</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($routes as $route)
                        <tr >
                            <td>{{ $route->name }}</td>
                            <td>
                                @foreach($route->methods as $method)
                                    <span class="badge badge-primary">{{ $method }}</span>
                                @endforeach
                            </td>
                            <td>{{ $route->function }}</td>
                            <td>      @foreach($route->params as $key => $value)
                                    <table class=" table-sm">
                                        <tr>
                                            <td>{{ $key  }}</td>
                                            <td>{{ $value  }}</td>
                                        </tr>
                                    </table>
                                @endforeach</td>
                            <td>{{ $route->response }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>





</body>
</html>
