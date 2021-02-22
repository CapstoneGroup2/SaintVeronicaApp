@extends('layouts.app')

@section('content')
<div class="login-container">
                <!-- <div class="col-md-6 login-form-2">
                    <img class="login-img" alt="Login Image" src="{{ URL::to('/images/login.jpg') }}">
                </div> -->
                <div class="login-form-1">
                    <form>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="name" name="email" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Your Password *" value="" />
                        </div>
                    </br/>
                        <div class="form-group">
                            <a class="btnSubmit btn-lg" type="submit" href="{{ route('index') }}">Login</a>
                            <!-- <input type="submit" class="btnSubmit btn-lg" value="Login" /> -->
                        </div>
                    </form>
                </div>
        </div>
@endsection