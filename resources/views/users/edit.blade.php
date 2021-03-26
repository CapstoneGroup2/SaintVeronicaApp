@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
  @foreach($users as $user)
    <h2 style="text-align: left">{{ $users[0]->role_name }}</h2>
    <div class="triangle-right" style="width:230px;"></div>
    <hr>
    <form id="enrollment-form" action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        {{method_field('PATCH')}}
        @csrf
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">    
                        <div class="form-group">
                            <label for="First Name">First Name</label>
                            <input type="text" class="form-control" name="user_first_name" placeholder="first name" value="{{ $user->user_first_name }}" >
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="First Name">Middle Name</label>
                            <input type="text" class="form-control" name="user_middle_name" placeholder="middle name" value="{{ $user->user_middle_name }}" >
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="First Name">Last Name</label>
                            <input type="text" class="form-control" name="user_last_name" placeholder="last name" value="{{ $user->user_last_name }}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password">
                        </div>
                    </div>
                    <div class="col-5">    
                        <div class="form-group">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" name="user_contact" placeholder="+639" value="{{ $user->user_contact }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Home Address</label>
                    <input type="text" class="form-control" name="user_address" placeholder="present address" value="{{ $user->user_address }}" >
                </div>
                <div class="row">
                    
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
                    <div class="col-3">    
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="user_gender">
                                @if($user->user_gender == 'F')
                                    <option value="F" selected>Female</option>
                                    <option value="M">Male</option>
                                @else
                                    <option value="M" selected>Male</option>
                                    <option value="F">Female</option>
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
                    <label for="status">User Profile Picture</label>
                    <br>
                    <img src='/images/users/{{ $user->user_image }}' height="243px" width="250px">
                    <input type="file" class="form-control" name="user_image" style="width:250px">
                </div>
            </div>
        </div>
        
        <hr>
        <div class="right">
            <a href="{{url()->previous()}}" class="btn btn-lg btn-danger ">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success">Update</button>
        </div>
    </form>
  @endforeach
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
