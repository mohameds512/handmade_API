<nav class="main-header navbar    navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class='bx bx-menu bx-sm'></i>
                <span class="sr-only">Toggle navigation</span>
            </a>
        </li>


    </ul>

    <ul class="navbar-nav ml-auto container">


        <li class="nav-item">


            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class='bx bx-search bx-sm'></i>
            </a>


            <div class="navbar-search-block">
                <form class="form-inline" action="#" method="get">
                    <input type="hidden" name="_token" value="7L6mHsRSyMsVbzBg26D9bf2O4gCgjVtmZqn5Dg1H">

                    <div class="input-group">


                        <input class="form-control form-control-navbar" type="search" name="adminlteSearch"
                               placeholder="search" aria-label="search">


                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class='bx bx-search bx-sm'></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class='bx bx-x-circle bx-xs' ></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class='bx bx-expand bx sm' ></i>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link"  href="{{route('notifications')}}">
                <i class="bx bxs-bell bx-sm"></i>
                <span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications->count()    }}</span>
            </a>

        </li>
        <li class="nav-item ">
            <a class="nav-link"  href="{{route('invitations')}}">
                {{ __('invitations') }}
                <i class='bx bx-envelope-open bx-sm' ></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="btn btn-default btn-flat float-right  btn-block " href="#"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-power-off bx-sm' ></i>
                Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                @csrf
            </form>

        </li>


    </ul>

</nav>

