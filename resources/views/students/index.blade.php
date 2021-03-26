@extends('layouts.app')

@section('title')
Students
@endsection

@section('content')
<h2 style="text-align: left">Students</h2>
<div class="triangle-right" style="width:150px;"></div>
<hr>
<table id="dataTable" class="table table-striped table-enrollment table-default">
  <thead>
      <tr>
      <th scope="col">ID No.</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col">Action</th>
      </tr>
  </thead>
</table>
@endsection

@section('script')    
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
var pathname = window.location.pathname;
var num = window.location.pathname.slice(window.location.pathname.lastIndexOf('/') + 1);

function setTable() {
  $('#dataTable').DataTable({
    processing: true,
    serverSide: true,
    ajax:{
      url: '/students',
      type: 'GET'
    },
    columns:[
      {
        data: 'student_id',
        name: 'student_id'
      },
      {
        data: 'full_name',
        name: 'full_name'
      },
      {
        data: 'student_email',
        name: 'student_email'
      },
      {
        data: 'student_address',
        name: 'student_address'
      },
      {
        data: 'student_home_contact',
        name: 'student_home_contact'
      },
      {
        data: 'action',
        name: 'action',
        orderable: false,
      }
    ]
  })
}
$(document).ready(function() {
  setTable();

  $('.btn-add').click(function () {
    window.location = "/students/create";
  });

  $('[data-toggle="tooltip"]').tooltip(); 

});

</script>
@endsection