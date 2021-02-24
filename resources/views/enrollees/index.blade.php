@extends('layouts.app')

@section('content')
<h2>Table of Enrollees</h2> 
  <table id="dataTable-enrollees" class="table table-striped table-enrollment" data-page-length='5'>
    <hr>
    <div class="row">
      <div class="col">
        <a href="{{ route('enrollee.create') }}" role="button" class="btn btn-lg btn-enroll">Enroll Student</a>
      </div>
      <div class="col-7">
        <label class="search" for="search">Search/Filter:</label>
        <input id="search-input" name="search" type="text" class="btn btn-lg">
      </div>
      <div class="col">
        <label for="" class="entries">Entries per page</label>
        <select name="" id="filter-length" class="btn btn-lg" data-target="#dataTable-enrollees">
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
        <th scope="col">ID Number</th>
        <th scope="col">Full Name</th>
        <th scope="col">Gender</th>
        <!-- <th scope="col">Age</th>
        <th scope="col">Birth Date</th>
        <th scope="col">Status</th> -->
        <th scope="col">Email Address</th>
        <th scope="col" class="center"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th>18105358</th>
        <td>Josephine Morre</td>
        <td>Female</td>
        <td>josephine.morre@gmail.com</td>
        <td class="center">
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </td>
        </tr>
        <tr>
        <th>18105358</th>
        <td>Josephine Morre</td>
        <td>Female</td>
        <td>josephine.morre@gmail.com</td>
        <td class="center">
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </td>
        </tr>
        <tr>
        <th scope="row">18105358</th>
        <td>Josephine Morre</td>
        <td>Female</td>
        <td>josephine.morre@gmail.com</td>
        <td class="center">
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </td>
        </tr>
        <tr>
        <th scope="row">18105358</th>
        <td>Josephine Morre</td>
        <td>Female</td>
        <td>josephine.morre@gmail.com</td>
        <td class="center">
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </td>
        </tr>
        <tr>
        <th scope="row">18105358</th>
        <td>Josephine Morre</td>
        <td>Female</td>
        <td>josephine.morre@gmail.com</td>
        <td class="center">
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </td>
        </tr>
        <tr>
        <th scope="row">18105358</th>
        <td>Josephine Morre</td>
        <td>Female</td>
        <td>josephine.morre@gmail.com</td>
        <td class="center">
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </td>
        </tr>
        <tr>
        <th scope="row">18105358</th>
        <td>Josephine Morre</td>
        <td>Female</td>
        <td>josephine.morre@gmail.comm</td>
        <td class="center">
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </td>
        </tr>
        </tbody>
    </table>
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/enrollees.js') }}"></script>
@endsection
