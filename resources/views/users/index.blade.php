@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
<h2 style="text-align: left;">Users</h2>
<div class="triangle-right" style="width:100px;"></div>
<br>
<button role="button" class="btn btn-lg btn-add"><span class="glyphicon glyphicon-plus"></span> Add User</button> 
<hr>
<table id="dataTable" class="table table-striped table-enrollment table-default">
<thead>
  <th scope="col">User Role</th>
  <th scope="col">Full Name</th>
  <th scope="col">Email Address</th>
  <th scope="col">Home Address</th>
  <th scope="col">Contact Number</th>
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
      url: '/users',
      type: 'GET'
    },
    columns:[
      {
        data: 'role_name',
        name: 'role_name'
      },
      {
        data: 'full_name',
        name: 'full_name'
      },
      {
        data: 'user_email',
        name: 'user_email'
      },
      {
        data: 'user_address',
        name: 'user_address'
      },
      {
        data: 'user_contact',
        name: 'user_contact'
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
    window.location = "/users/create";
  });
  $('[data-toggle="tooltip"]').tooltip();   
  $('.btn-remove').click(function() {
    var id = $(this).parent().parent('tr').attr('id');
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
      url: '/users/' + id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token
            },
      success: function(dataResult){
                console.log("succcess");
                location.reload(true);
      }
    });
  })
});

</script>
@endsection