@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')

<div class="sticky">
    <h2 style="text-align: left">{{ $users[0]->role }}</h2>
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
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" >
                            @if ($errors->has('first_name'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('first_name')}}</p>
                                </span>
                            @endif
                            @if(session()->has('first_name_error'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{session()->get('first_name_error')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="{{ $user->middle_name }}" >
                            @if ($errors->has('middle_name'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('middle_name')}}</p>
                                </span>
                            @endif
                            @if(session()->has('middle_name_error'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{session()->get('middle_name_error')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" >
                            @if ($errors->has('last_name'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('last_name')}}</p>
                                </span>
                            @endif
                            @if(session()->has('last_name_error'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{session()->get('last_name_error')}}</p>
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
                            @if(session()->has('password_error'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{session()->get('password_error')}}</p>
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
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" name="contact" value="{{ $user->contact }}" >
                            @if ($errors->has('contact'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">{{$errors->first('contact')}}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" >
                    @if ($errors->has('email'))
                        <span class="invalid feedback" role="alert">
                            <p style="color:tomato;">{{$errors->first('email')}}</p>
                        </span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <label for="address">Home Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $user->address }}" >
                    @if ($errors->has('address'))
                        <span class="invalid feedback" role="alert">
                            <p style="color:tomato;">{{$errors->first('address')}}</p>
                        </span>
                    @endif
                </div>
                <br>
                <div class="row">
                    <div class="col">    
                        <div class="form-group">
                            <label for="role_id">User Role</label>
                            <select class="form-control" name="role_id">
                                @foreach($roles as $role)
                                    @if($role->id == $user->role_id)
                                        <option value="{{ $role->id }}" selected>{{ $role->role }}</option>
                                    @else
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('role_id'))
                                <span class="invalid feedback" role="alert">
                                    <p style="color:tomato;">The user role field is required.   </p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender">
                                @if($user->gender == 'Female')
                                    <option value="Female" selected>Female</option>
                                    <option value="Male">Male</option>
                                @elseif($user->gender == 'Male')
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
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                @if($user->status == 'Single')
                                    <option value="Single" selected>Single</option>
                                    <option value="Married">Married</option>
                                @elseif($user->status == 'Married')
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
                            <label for="active_status">Active Status</label>
                            <select class="form-control" name="active_status">
                                @if($user->active_status == '1')
                                    <option value="1" selected>True</option>
                                    <option value="2">False</option>
                                @elseif($user->active_status == '2')
                                    <option value="2" selected>False</option>
                                    <option value="1">True</option>
                                @endif
                            </select>
                        </div>
                    </div>
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
