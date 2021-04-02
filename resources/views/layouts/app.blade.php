<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    @if(isset(Auth::user()->user_email))
        <nav class="header navbar fixed-top navbar-expand-lg">
        <span style="font-size:30px;cursor:pointer; margin: 0 10px;color:white;" onclick="openNav()">&#9776;</span>
            <a class="navbar-brand logo" href=""><img id="logo-navbar" src="{{ URL::to('/images/logo.jpg') }}">St. Veronica Learning Center</a>
            <div class="btn-group" style="margin: 0 20px 0 auto">
                <a href="" role="button" class="btn btn-success" style="color: white !important">
                    <img id="profile" src="/images/users/{{ Auth::user()->user_image }}">{{ Auth::user()->user_email }}
                </a>
                <a href="/logout" role="button" class="btn btn-danger" style="color: white !important"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </div>
        </nav>
        
        <div class="container content" id="main">
            
            <div id="mySidenav" class="sidenav" style="display: none;">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                @if(Auth::user()->role_id == 1)
                    <a href="/dashboard"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                    <button class="dropdown-btn"><i class="fa fa-fw fa-wrench"></i> Management
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="/users"><i class="fa fa-check-square"></i> Users</a>
                        <a href="/classes"><i class="fa fa-check-square"></i> Classes</a>
                        <a href="/announcements"><i class="fa fa-check-square"></i> Announcements</a>
                    </div>
                    <button class="dropdown-btn"><i class="fa fa-fw fa-user"></i> Students 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        @foreach(session()->get('classes') as $class)
                            <a href="/students/classes/{{ $class[1] }}"><i class="fa fa-check-square"></i> {{ $class[0] }}</a>
                        @endforeach
                    </div>
                    <button class="dropdown-btn"><i class="fa fa-fw fa-money"></i> Miscellaneous & Other Fees
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        @foreach(session()->get('classes') as $class)
                            <a href="/miscellaneous-and-other-fees/classes/{{ $class[1] }}"><i class="fa fa-check-square"></i> {{ $class[0] }}</a>
                        @endforeach
                    </div>
                    <!-- <a href="/payments"><i class="fa fa-fw fas fa-bullhorn"></i> Payments</a> -->
                    <a href="/payments-history"><i class="fa fa-fw fas fa-bullhorn"></i> History of Payments</a>
                    <a href="/announcements"><i class="fa fa-fw fas fa-bullhorn"></i> Announcements</a>
                    <a href="/reports"><i class="fa fa-fw fa fa-area-chart"></i> Reports</a>

                @elseif(Auth::user()->role_id == 2)
                    <a href="/home"><i class="fa fa-fw fa-home"></i> Home</a>
                    <button class="dropdown-btn"><i class="fa fa-fw fa-user"></i> Students 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        @foreach(session()->get('classes') as $class)
                            <a href="/students/classes/{{ $class[1] }}"><i class="fa fa-check-square"></i> {{ $class[0] }}</a>
                        @endforeach
                    </div>
                    <button class="dropdown-btn"><i class="fa fa-fw fa-money"></i> Miscellaneous & Other Fees
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        @foreach(session()->get('classes') as $class)
                            <a href="/miscellaneous-and-other-fees/classes/{{ $class[1] }}"><i class="fa fa-check-square"></i> {{ $class[0] }}</a>
                        @endforeach
                    </div>
                    <a href="/payments-history"><i class="fa fa-fw fas fa-bullhorn"></i> History of Payments</a>
                    <a href="/reports"><i class="fa fa-fw fa fa-area-chart"></i> Reports</a>
                @endif
                
            </div>

            @yield('content')

        </div>
        
        @yield('script')
        <!-- <script src="{{ URL::to('/js/app.js') }}"></script> -->
        <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
        function openNav() {
        document.getElementById("mySidenav").style.display = "block";
        document.getElementById("main").style.paddingLeft = "260px";
        }
        function closeNav() {
        document.getElementById("mySidenav").style.display = "none";
        document.getElementById("main").style.paddingLeft= "10px";
        }
        </script>
    @else
        <script>window.location = "/login";</script>
    @endif
    </body>
</html>