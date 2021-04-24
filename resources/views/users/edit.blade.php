@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
@foreach($users as $user)
<div class="sticky">
    <h2 style="text-align: left">{{ $users[0]->role_name }}</h2>
    @if($users[0]->role_id == 1)
        <div class="triangle-right" style="width:230px;"></div>
    @else
        <div class="triangle-right" style="width:160px;"></div>
    @endif
</div>
    <hr>
    <form id="enrollment-form" action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        {{method_field('PATCH')}}
        @csrf

        <h2 class="text-warning">User Information</h2>
        <hr>

        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">    
                        <div class="form-group">
                            <label for="First Name">First Name</label>
                            <input type="text" class="form-control" name="user_first_name" value="{{ $user->user_first_name }}" >
                            @if ($errors->has('user_first_name'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('user_first_name')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="First Name">Middle Name</label>
                            <input type="text" class="form-control" name="user_middle_name" value="{{ $user->user_middle_name }}" >
                            @if ($errors->has('user_middle_name'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('user_middle_name')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="First Name">Last Name</label>
                            <input type="text" class="form-control" name="user_last_name" value="{{ $user->user_last_name }}" >
                            @if ($errors->has('user_last_name'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('user_last_name')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    @if(isset(Auth::user()->user_email) && Auth::user()->id == $user->id)
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" >
                                @if ($errors->has('password'))
                                    <span class="invalid feedback" role="alert">
                                        <p style="color:tomato;">{{$errors->first('password')}}</p>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" >
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid feedback" role="alert">
                                        <p style="color:tomato;">{{$errors->first('password_confirmation')}}</p>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="col-5">    
                        <div class="form-group">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" name="user_contact" value="{{ $user->user_contact }}" >
                            @if ($errors->has('user_contact'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('user_contact')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="address">Home Address</label>
                    <input type="text" class="form-control" name="user_address" value="{{ $user->user_address }}" >
                    @if ($errors->has('user_address'))
                        <span class="invalid feedback" role="alert">
                            <p style="color:tomato;">{{$errors->first('user_address')}}</p>
                        </span>
                    @endif
                </div>
                <br>
                <div class="row">
                    @if(isset(Auth::user()->user_email) && Auth::user()->role_id == 1)
                        <div class="col">    
                            <div class="form-group">
                                <label for="user_role_id">User Role</label>
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        @if($role->id == $user->role_id)
                                            <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                                        @else
                                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="col">    
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="user_gender">
                                @if($user->user_gender == 'Female')
                                    <option value="Female" selected>Female</option>
                                    <option value="Male">Male</option>
                                @else
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="user_status">
                                @if($user->user_status == 'Single')
                                    <option value="Single" selected>Single</option>
                                    <option value="Married">Married</option>
                                @else
                                    <option value="Married" selected>Married</option>
                                    <option value="Single">Single</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group center">
                    <br>
                    <img src='/images/users/{{ $user->user_image }}' height="200px" width="92%">
                    <br><br>
                    <label for="status">User Profile Picture</label>
                    <input type="file" class="form-control image" name="user_image" style="width:92%">
                    @if ($errors->has('user_image'))
                        <span class="invalid feedback" role="alert">
                            <p style="color:tomato;">{{$errors->first('user_image')}}</p>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        
        <hr>
        <div class="right">
            <a href="/users" class="btn btn-lg btn-danger ">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success">Update</button>
        </div>
    </form>
  @endforeach
@endsection

@section('script')  
@endsection
