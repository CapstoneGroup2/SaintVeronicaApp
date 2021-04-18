@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
<div class="sticky">
  <h2 style="text-align: left;">Users</h2>
</div>
<button role="button" class="btn btn-lg btn-add"><span class="glyphicon glyphicon-plus"></span> Add User</button> 
<hr>

@if(session()->has('success'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert">x</button>
        {{session()->get('success')}}
    </div>
@endif

<table id="dataTable" class="table table-striped table-enrollment table-default">
  <thead>
    <th scope="col" class="sticky" style="top: 120px !important;">User Role</th>
    <th scope="col" class="sticky" style="top: 120px !important;">Full Name</th>`
    <th scope="col" class="sticky" style="top: 120px !important;">Email Address</th>
    <th scope="col" class="sticky" style="top: 120px !important;">Contact Number</th>
    <th scope="col" class="sticky" style="top: 120px !important;">Action</th>
    </tr>
  </thead>
</table>
<div id="loader" class="text-center">
  <div class="spinner-border" style="width: 5rem; height: 5rem;" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Confirmation</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4 align="center" style="margin:0;">Are you sure you want to remove this user?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" id="btn-ok" class="btn btn-lg btn-danger">OK</button>
      </div>
    </div>
  </div>
</div>
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
  
  $("#loader").hide();
  
  $('.btn-add').click(function () {
    window.location = "/users/create";
  });

  $('[data-toggle="tooltip"]').tooltip();   

  var id;

  $(document).on('click', '.btn-remove', function() {
    id= $(this).attr('id');
    $('#confirmModal').modal('show');
  });

  $('#btn-ok').click(function() {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
      url: '/users/' + id,
      type: 'DELETE',
      data: {
          "id": id,
          "_token": token
      },
      beforeSend: function(){
        $('#confirmModal').modal('hide');
        $("#loader").show();
        $('table').hide();
      },
      success: function(dataResult){
        console.log("succcess");
        location.reload(true);
      }
    });
  });
  
});

</script>
@endsection