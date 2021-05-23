@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')

<div class="sticky">
    <h2 style="text-align: left">{{ $users[0]->role_name }}</h2>
    @if($users[0]->role_id == 1)
        <div class="triangle-right" style="width:230px;"></div>
    @else
        <div class="triangle-right" style="width:160px;"></div>
    @endif
</div>
<hr>

@foreach($users as $user)
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
                            <label for="user_first_name">First Name</label>
                            <input type="text" class="form-control" name="user_first_name" value="{{ $user->user_first_name }}" >
                            @if ($errors->has('user_first_name'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('user_first_name')}}</p>
                                </span>
                            @endif
                            @if(session()->has('user_first_name_error'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{session()->get('user_first_name_error')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="user_middle_name">Middle Name</label>
                            <input type="text" class="form-control" name="user_middle_name" value="{{ $user->user_middle_name }}" >
                            @if ($errors->has('user_middle_name'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('user_middle_name')}}</p>
                                </span>
                            @endif
                            @if(session()->has('user_middle_name_error'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{session()->get('user_middle_name_error')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="user_last_name">Last Name</label>
                            <input type="text" class="form-control" name="user_last_name" value="{{ $user->user_last_name }}" >
                            @if ($errors->has('user_last_name'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('user_last_name')}}</p>
                                </span>
                            @endif
                            @if(session()->has('user_last_name_error'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{session()->get('user_last_name_error')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                            <span toggle="#password" class="glyphicon glyphicon-eye-open field-icon toggle-password" style="color: black"></span>
                            @if ($errors->has('password'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('password')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmation" name="password_confirmation" >
                            <span toggle="#confirmation" class="glyphicon glyphicon-eye-open field-icon toggle-confirmation" style="color: black"></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('password_confirmation')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="user_contact">Contact Number</label>
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
                    <label for="user_email">Email Address</label>
                    <input type="email" class="form-control" name="user_email" value="{{ $user->user_email }}" >
                    @if ($errors->has('user_email'))
                        <span class="invalid feedback" role="alert">
                            <p style="color:tomato;">{{$errors->first('user_email')}}</p>
                        </span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <label for="user_address">Home Address</label>
                    <input type="text" class="form-control" name="user_address" value="{{ $user->user_address }}" >
                    @if ($errors->has('user_address'))
                        <span class="invalid feedback" role="alert">
                            <p style="color:tomato;">{{$errors->first('user_address')}}</p>
                        </span>
                    @endif
                </div>
                <br>
                <div class="row">
                    <div class="col">    
                        <div class="form-group">
                            <label for="user_role_id">User Role</label>
                            <select class="form-control" name="user_role_id">
                                @foreach($roles as $role)
                                    @if($role->id == $user->role_id)
                                        <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                                    @else
                                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('user_role_id'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">The user role field is required.   </p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="user_gender">Gender</label>
                            <select class="form-control" name="user_gender">
                                @if($user->user_gender == 'Female')
                                    <option value="Female" selected>Female</option>
                                    <option value="Male">Male</option>
                                @elseif($user->user_gender == 'Male')
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                @else 
                                    <option value="" selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="user_status">Status</label>
                            <select class="form-control" name="user_status">
                                @if($user->user_status == 'Single')
                                    <option value="Single" selected>Single</option>
                                    <option value="Married">Married</option>
                                @elseif($user->user_status == 'Married')
                                    <option value="Married" selected>Married</option>
                                    <option value="Single">Single</option>
                                @else 
                                    <option value="" selected>Select Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="user_active_status">Active Status</label>
                            <select class="form-control" name="user_active_status">
                                @if($user->user_active_status == '1')
                                    <option value="1" selected>True</option>
                                    <option value="2">False</option>
                                @elseif($user->user_active_status == '2')
                                    <option value="2" selected>False</option>
                                    <option value="1">True</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group center">
                    <br>
                    <img id = "profileImage" src='/images/users/{{ $user->user_image }}' height="200px" width="92%">
                    <br><br>
                    <label for="user_image">User Profile Picture</label>
                    <input type="file" onchange = "readURL(this);" class="form-control image" name="user_image" style="width:92%">
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
    <script src="{{URL::to('/js/user.js')}}"></script> 
@endsection
