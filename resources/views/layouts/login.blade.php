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
    <nav class="header navbar fixed-top navbar-expand-lg">
        <a class="navbar-brand logo" href=""><img id="logo-navbar" src="{{ URL::to('/images/logo.jpg') }}">St. Veronica Learning Center</a>
    </nav>
        <div class="container content">
            <div class="login-container">
                <div class="login-form-1">
                    
                    <form method="POST" action="{{ url('/login') }}">
                        @csrf

                        @if(isset(Auth::user()->user_email))
                            <script>window.location="/index";</script>
                        @endif

                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-block" style="font-size: 13px;">
                                <button class="close" type="button" data-dismiss="alert">x</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if(count($errors) > 0)
                            <div class="alert alert-danger" style="font-size: 13px;">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="email" style="margin-bottom: 1rem; letter-spacing: 1px;">Email:</label>
                            <input type="email" class="form-control" id="name" name="email" placeholder="Your Email *" value="{{ old('email') }}" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="password" style="margin-bottom: 1rem; letter-spacing: 1px;">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Your Password *" value="{{ old('password') }}" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <br>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success btnSubmit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
