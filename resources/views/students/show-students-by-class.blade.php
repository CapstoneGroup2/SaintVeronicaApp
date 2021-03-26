@extends('layouts.app')

@section('title')
{{ session()->get('present_class_name') }} Students
@endsection

@section('content')
<h2 style="text-align: left">{{ session()->get('present_class_name') }} Students</h2>
<div class="triangle-right" style="width:300px;"></div>
<br>
<button class="btn btn-lg btn-add"><span class="glyphicon glyphicon-plus"></span> Enroll Student</button> 
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
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Confirmation</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4 align="center" style="margin:0;">Are you sure you want to remove this student?</h4>
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
      url: '/students/classes/' + num,
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

  var id;

  $(document).on('click', '.btn-remove', function() {
    id= $(this).attr('id');
    $('#confirmModal').modal('show');
  });

  $('#btn-ok').click(function() {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
      url: '/students/' + id,
      type: 'DELETE',
      data: {
          "id": id,
          "_token": token
      },
      beforeSend:function() {
        $('#btn-ok').text('Deleting...');
      },
      success: function(data) {
        console.log('im here');
        $('#confirmModal').modal('hide');
        $('#btn-ok').text('OK');
        $('#dataTable').DataTable().ajax.reload();
      }
    });
  });
});

</script>
@endsection