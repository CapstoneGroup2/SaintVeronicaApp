@extends('layouts.app')

@section('content')
<h2>Table of Payments</h2>
  <div class="table-responsive bg-default">          
  <table id="dataTable-payments" class="table table-striped table-enrollment">
    <thead>
        <tr>
        <th scope="col">ID Number</th>
        <th scope="col">Date</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Total Amount</th>
        <th scope="col">Amount Due</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">18105358</th>
        <td>February 21, 2021</td>
        <td>Josephine Morre</td>
        <td>For Music Tutorial</td>
        <td>Php 1000</td>
        <td>Php 2000</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>Otto</td>
        <td>Mark</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>Otto</td>
        <td>Mark</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </tr>
        <tr>
        <th scope="row">4</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>Otto</td>
        <td>Mark</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </tr>
        <tr>
        <th scope="row">5</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>Otto</td>
        <td>Mark</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </tr>
        <tr>
        <th scope="row">6</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td> 
        <td>Otto</td>
        <td>Mark</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </tr>
        <tr>
        <th scope="row">7</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>Otto</td>
        <td>Mark</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </tr>
        <tr>
        <th scope="row">8</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>Otto</td>
        <td>Mark</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </tr>
        <tr>
        <th scope="row">9</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>Otto</td>
        <td>Mark</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </tr>
        <tr>
        <th scope="row">10</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>Otto</td>
        <td>Mark</td>
        <td>
          <button class="btn btn-lg btn-primary">View</button>
          <button class="btn btn-lg btn-warning">Edit</button>
          <button class="btn btn-lg btn-danger">Delete</button>
        </tr> 
    </tbody>
    </table>
  </div>
@endsection

@section('script')
  <script src="{{ URL::to('/js/dashboard.js') }}"></script>
@endsection
