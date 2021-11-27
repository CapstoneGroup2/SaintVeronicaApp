<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>

    @if(Auth::check() && Auth::user()->user_active_status == 1)

        <nav class="header navbar fixed-top navbar-expand-lg">
            <span id="toggle" style="font-size:30px; cursor: pointer; margin: 0 10px; color: white; display: none;" onclick="openNav()">&#9776;</span>
            <a class="navbar-brand logo" href=""><img id="logo-navbar" src="{{ URL::to('/images/logo.jpg') }}">St. Veronica Learning Center</a>
            <div class="btn-group" style="margin: 0 20px 0 auto">
                <a href="/users/{{ Auth::user()->id }}/edit" role="button" class="btn btn-success" style="color: white !important">
                    <img id="profile" src="/images/users/{{ Auth::user()->user_image }}">{{ Auth::user()->user_email }}
                </a>
                <a href="/logout" role="button" id="btn-logout" class="btn btn-danger" style="color: white !important"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </div>
        </nav>
        
        <div class="container content" id="main" style="padding-left: 260px;">
            
            <div id="mySidenav" class="sidenav" style="display: block;">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                @if(Auth::user()->role_id == 1)
                    <a href="/dashboard" id="1"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                    <button id="2" class="dropdown-btn"><i class="fa fa-fw fa-wrench"></i> Management
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="/users"><i class="fa fa-check-square"></i> Users</a>
                        <a href="/school-year"><i class="fa fa-check-square"></i> List of School Year</a>
                        <a href="/classes"><i class="fa fa-check-square"></i> Classes</a>
                    </div>
                    <button id="3" class="dropdown-btn"><i class="fa fa-fw fa-user"></i> Students 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        @foreach(session()->get('classes') as $class)
                            <a href="/students/classes/{{ $class[1] }}"><i class="fa fa-check-square"></i> {{ $class[0] }}</a>
                        @endforeach
                    </div>
                    <button id="4" class="dropdown-btn"><i class="fa fa-fw fa-money"></i> Miscellaneous & Other Fees
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        @foreach(session()->get('classes') as $class)
                            <a href="/miscellaneous-and-other-fees/classes/{{ $class[1] }}"><i class="fa fa-check-square"></i> {{ $class[0] }}</a>
                        @endforeach
                    </div>
                    <a href="/payments-history" id="5"><i class="fa fa-fw fas fa-history"></i> History of Payments</a>
                    <a href="/announcements" id="6"><i class="fa fa-fw fas fa-bullhorn"></i> Announcements</a>

                @elseif(Auth::user()->role_id == 2)
                    <a href="/home" id="1"><i class="fa fa-fw fa-home"></i> Home</a>
                    <button id="2" class="dropdown-btn"><i class="fa fa-fw fa-user"></i> Students 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        @foreach(session()->get('classes') as $class)
                            <a href="/students/classes/{{ $class[1] }}"><i class="fa fa-check-square"></i> {{ $class[0] }}</a>
                        @endforeach
                    </div>
                    <button id="3" class="dropdown-btn"><i class="fa fa-fw fa-money"></i> Miscellaneous & Other Fees
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        @foreach(session()->get('classes') as $class)
                            <a href="/miscellaneous-and-other-fees/classes/{{ $class[1] }}"><i class="fa fa-check-square"></i> {{ $class[0] }}</a>
                        @endforeach
                    </div>
                    <a id="4" href="/payments-history"><i class="fa fa-fw fas fa-history"></i> History of Payments</a>
                    <a id="5" href="/announcements"><i class="fa fa-fw fas fa-bullhorn"></i> Announcements</a>
                    <a id="6" href="/reports"><i class="fa fa-fw fa fa-area-chart"></i> Reports</a>
                @endif
                
            </div>

            @yield('content')

        </div>
        
        @yield('script')
        <script src="/js/app.js"></script>
    @else

        <script>window.location = "/logout";</script>

    @endif

    </body>
</html>