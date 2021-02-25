@extends('layouts.app')

@section('content')
<h2>Table of Items</h2> 
  <table id="dataTable-students" class="table table-striped table-enrollment">
    <hr>
    <div class="row">
      <div class="col">
        <a href="/item/create" role="button" class="btn btn-lg btn-add">Add Item</a>
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
        <th scope="col">Year Level</th>
        <th scope="col">Item Name</th>
        <th scope="col">Item Description</th>
        <th scope="col">Item Price</th>
        <th scope="col" class="center"></th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>Nursery</td>
        <td>Uniform</td>
        <td>Uniform for nursery students</td>
        <td>500.00</td>
        <td class="center">
          <a href="" class="btn btn-md btn-primary" role="button">View</a>
          <a href="" class="btn btn-md btn-warning" role="button">Edit</a>
          <button class="btn btn-md btn-danger btn-remove">Remove</button>
        </td>
        </tr>
        </tbody>
    </table>
@endsection

@section('script')  
  <script type="text/javascript" src="{{ URL::to('/js/student.js') }}"></script>
@endsection
