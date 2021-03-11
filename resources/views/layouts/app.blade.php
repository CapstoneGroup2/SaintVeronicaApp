<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'St.Veronica System')}} - @yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <!-- <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  
    <script src="vendor/select2/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body>
    <nav class="header navbar fixed-top navbar-expand-lg navbar-dark">
        <a class="navbar-brand logo" href="/index"><img id="logo-navbar" src="{{ URL::to('/images/logo.jpg') }}">St. Veronica Learning Center</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse header-right" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                    <div class="dropdown">
                        @if(isset(Auth::user()->user_email))
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img id="profile" src="{{ URL::to('/images/profile.jpg') }}">{{ Auth::user()->user_first_name . ' ' . Auth::user()->user_last_name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Account Settings</a>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                        @else
                            <script>window.location = "/login";</script>
                        @endif
                    </div>
            </div>
        </div>
    </nav>
    
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/index"><i class="fa fa-fw fa-home"></i> Home</a>
        <button class="dropdown-btn"><i class="fa fa-fw fa-user"></i> Students 
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/students/gradelevels/2">Nursery</a>
            <a href="/students/gradelevels/3">Nursery 2</a>
            <a href="/students/gradelevels/4">Kinder 1</a>
            <a href="/students/gradelevels/5">Kinder 2</a>
            <a href="/students/gradelevels/6">Grade 1</a>
            <a href="/students/gradelevels/7">Grade 2</a>
            <a href="/students/gradelevels/8">Grade 3</a>
            <a href="/students/gradelevels/9">Grade 4</a>
            <a href="/students/gradelevels/10">Grade 5</a>
            <a href="/students/gradelevels/11">Grade 6</a>
            <a href="/students/tutorials/2">Music Tutorial</a>
            <a href="/students/tutorials/3">Piano Tutorial</a>
        </div>
        <button class="dropdown-btn"><i class="fa fa-fw fa-envelope"></i> Miscellanious & Other Fees
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            
            <a href="/items">Nursery</a>
            <a href="/items">Nursery 2</a>
            <a href="/items">Kinder 1</a>
            <a href="/items">Kinder 2</a>
            <a href="/items">Grade 1</a>
            <a href="/items">Grade 2</a>
            <a href="/items">Grade 3</a>
            <a href="/items">Grade 4</a>
            <a href="/items">Grade 5</a>
            <a href="/items">Grade 6</a>
            <a href="/items">Music Tutorial</a>
            <a href="/items">Piano Tutorial</a>
        </div>
        <button class="dropdown-btn"><i class="fa fa-fw fa-wrench"></i> Management
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
        </div>
    </div>
    <span style="font-size:30px;cursor:pointer; margin-left: 10px;" onclick="openNav()">&#9776;</span>
    <div class="container content" id="main">
        
        @include('layouts.messages')
        @yield('content')
    </div>
    @yield('script')
    <script src="{{ URL::to('/js/app.js') }}"></script>
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
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("mySidenav").style.marginTop = "60px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "auto";
    }
    </script>
    </body>
</html>
