<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'St.Veronica System')}}</title>

    <!-- <link href="{{ asset('css/app_old.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- Bootstrap core CSS -->
     <!-- <link href = {{ asset("bootstrap/css/bootstrap.css") }} rel="stylesheet" /> -->

    <!-- Custom styles for this template -->
    <!-- <link href = {{ asset("bootstrap/css/sticky-footer-navbar.css") }} rel="stylesheet" /> -->

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="header navbar fixed-top navbar-expand-lg navbar-dark">
        <a class="navbar-brand logo" href="{{ route('index') }}"><img id="logo-navbar" src="{{ URL::to('/images/logo.jpg') }}">Saint Veronica Learning Center</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse header-right" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                    <a class="nav-link nav-item" href="{{ route('enrollees') }}">Enrollees</a>
                    <a class="nav-link nav-item" href="{{ route('payments') }}">Payments</a>
                    <!-- <a class="nav-link nav-item" href="{{ route('login') }}">Josephine Morre</a> -->
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img id="profile" src="{{ URL::to('/images/profile.jpg') }}">Josephine Morre
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Account Settings</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="{{ route('login') }}">Logout</a>
                        </div>
                    </div>
            </div>
        </div>
    </nav>
        <div class="container content">
            @yield('content')
        </div>

        <!-- <footer class="site-footer">
            <div class="row  row-no-gutters">
                <div class="col-sm-12 col-md-6">
                <ul class="list">
                    <h6>Visit Us</h6>
                    <p class="text-justify">Bantug St., Tagnipa, Maasin City, Southern Leyte
                    <h6>Contact Us</h6>
                    <li>
                        <i class= "fa fa-phone"></i>
                        (053)570-2182
                    </li>
                    <li>
                        <i class= "fa fa-phone"></i>
                        0917-314-8374
                    </li>
                </ul>
                </div>



                <div class="col-xs-6 col-md-6">
                <ul class="list">
                    <h6>Message Us</h6>
                    <li>
                        <i class="fa fa-envelope"></i>
                        stveronicalearningcenter@gmail.com
                    </li>
                    <li>
                        <i class="fab fa-facebook-square"></i>
                        www.facebook.com/St-Veronica-Learning-Center
                    </li>
                </ul>
                </div>
            </div>
                <hr>
            <div class="container">
                <div class="row row-no-gutters">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
                <a href="#">St.Veronica Learning Center</a>.
                    </p>
                </div>
            </div>
        </footer> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script src="{{ URL::to('/js/app.js') }}"></script>
    </body>
</html>
