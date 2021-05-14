<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'St.Veronica System')}} - Login</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    @if(isset(Auth::user()->user_email))
        @if(Auth::user()->role_id == 1)
            <script>window.location="/dashboard";</script>
        @else
            <script>window.location="/home";</script>
        @endif
    @endif
    <nav class="header navbar fixed-top navbar-expand-lg">
        <a class="navbar-brand logo" href="/welcome"><img id="logo-navbar" src="{{ URL::to('/images/logo.jpg') }}">St. Veronica Learning Center</a>
        <div class="btn-group" style="margin: 0 20px 0 auto;">
            <a href="/login" role="button" class="btn btn-success" style="color: white !important; letter-spacing: 2px;"><span class="glyphicon glyphicon-log-in" style="font-size: 15px; color: white !important;"></span> Login</a>
        </div>
    </nav>

    <div class="container content">
        <div class="login-container">
            <div class="login-form-1">
                
                <form method="POST" action="{{ url('/login') }}">
                    @csrf


                    @if($message = Session::get('error'))
                        <div class="alert alert-danger alert-block" style="font-size: 13px;">
                            <button class="close" type="button" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="email" style="text-align: right">Email:</label>
                            </div>
                            <div class="col">
                                <input type="email" class="form-control" id="name" name="email" value="{{ old('email') }}" />
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid feedback" role="alert">
                                <p style="color:tomato;">{{$errors->first('email')}}</p>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="password">Password:</label>
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" />
                                <span toggle="#password" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid feedback" role="alert">
                                <p style="color:tomato;">{{$errors->first('password')}}</p>
                            </span>
                        @endif
                    </div>

                    <br>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <a href="/welcome" class="btn btn-lg btn-danger btn-cancel" role="button">Cancel</a>
                            </div>
                            <div class="col" style="text-align: right;">
                                <button type="submit" class="btn btn-lg btn-success btn-login">Login</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="/js/login.js"></script>
    </body>
</html>
