@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
<div class="sticky">
    <h2 style="text-align: left">Add User</h2> 
    <div class="triangle-right" style="width:150px;"></div>
</div>
<hr>
<form id="enrollment-form" action="/users" method="post">
<h2 class="text-warning">User Information</h2>
<hr>
@csrf
    <div class="row">
        <div class="col">    
            <div class="form-group">
                <label for="First Name">First Name</label>
                <input type="text" class="form-control" name="user_first_name" value="{{ old('user_first_name') }}">
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
                <input type="text" class="form-control" name="user_middle_name" value="{{ old('user_middle_name') }}">
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
                <input type="text" class="form-control" name="user_last_name" value="{{ old('user_last_name') }}">
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
        <div class="col">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="user_email" value="{{ old('user_email') }}">
                @if ($errors->has('user_email'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('user_email')}}</p>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-5">    
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" class="form-control" name="user_contact" value="{{ old('user_contact') }}">
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
        <input type="text" class="form-control" name="user_address" value="{{ old('user_address') }}">
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
                    <option value="" selected>Select Role</option>
                    @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option> 
                    @endforeach
                </select>
                @if ($errors->has('user_role_id'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">The user role field is required.</p>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-3">    
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="user_gender">
                    <option value="" selected>Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
                @if ($errors->has('user_gender'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('user_gender')}}</p>
                    </span>
                @endif
            </div>
        </div>
        <div class="col">    
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="user_status">
                    <option value="" selected>Select Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
                @if ($errors->has('user_status'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('user_status')}}</p>
                    </span>
                @endif
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="image">Profile Picture</label>
                <input type="file" name="user_image" class="form-control image">
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
        <a href="/users" class="btn btn-lg btn-danger" role="button">Cancel</a>
        <button type="submit" class="btn btn-lg btn-success">Submit</button>
    </div>
</form>
@endsection

@section('script')
  <script src="{{ URL::to('/js/student.js') }}"></script>
@endsection
