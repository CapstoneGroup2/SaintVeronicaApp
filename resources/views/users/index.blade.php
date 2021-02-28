@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
<h2>Table of Users</h2> 
  <table id="dataTable-students" class="table table-striped table-enrollment">
    <hr>
    <div class="row">
      <div class="col">
        <a href="/users/create" role="button" class="btn btn-lg btn-add">Add User</a>
      </div>
      <div class="col-7">
        <label class="search" for="search">Search/Filter:</label>
        <input id="search-input" name="search" type="text" class="btn btn-lg">
      </div>
      <div class="col">
        <label for="" class="entries">Entries per page</label>
        <select name="" id="filter-length" class="btn btn-lg" data-target="#dataTable-students">
          <option value="10">5</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>
      
    </div>
    <hr>
    <thead>
        <tr>
        <th scope="col">User Role</th>
        <th scope="col">Full Name</th>
        <th scope="col">Email Address</th>
        <th scope="col">Home Address</th>
        <th scope="col">Contact Number</th>
        <th scope="col" class="center"></th>
        </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr id='{{ $user->id }}'>
        <?php
        if ($user->user_role_id == 1) 
          echo '<td>Administrator</td>';
        else
          echo '<td>Registrar</td>';
        ?>
        <td>{{ $user->user_first_name . ' ' . $user->user_last_name }}</td>
        <td>{{ $user->user_email }}</td>
        <td>{{ $user->user_address }}</td>
        <td>{{ $user->user_contact }}</td>
        <td>
            <a href="/users/{{ $user->id }}" class="btn btn-md btn-primary" role="button">View</a>
            <a href="/users/{{ $user->id }}/edit" class="btn btn-md btn-warning" role="button">Edit</a>
            <button class="btn btn-md btn-danger btn-remove">Remove</button>
        </td>
        </tr>
      @endforeach
    </tbody>
    </table>
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
