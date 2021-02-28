@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
  @foreach($users as $user)
    <form id="enrollment-form" action="/users/{{ $user->id }}" method="POST">
      {{method_field('PATCH')}}
      <div class="title-id">
        <label>user ID Number : <span>{{ $user->id }}</span></label>
      </div>
      <hr>
      @csrf
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
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="user_email" placeholder="name@example.com" value="{{ $user->user_email }}" >
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
                    <select class="form-control" name="user_role_id">
                        @foreach($userRoles as $userRole)
                        <?php
                        if ($userRole->id == $user->user_role_id) {
                            echo '<option value="' . $userRole->user_role_name .'" selected>' . $userRole->user_role_name . '</option';
                        } else {
                            echo '<option value="' . $userRole->user_role_name .'">' . $userRole->user_role_name . '</option';
                        }
                        ?>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">    
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="user_gender">
                        <option selected>{{ $user->user_gender }}</option>
                    </select>
                </div>
            </div>
            <div class="col">    
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="user_status">
                        <option selected>{{ $user->user_status }}</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="right">
            <a href="/users" class="btn btn-lg btn-danger" role="button">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success">Update</button>
        </div>
    </form>
  @endforeach
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
