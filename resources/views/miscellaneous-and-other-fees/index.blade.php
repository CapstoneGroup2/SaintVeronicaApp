@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')
<h2 style="text-align: left">{{ session()->get('present_class_name') }} Class</h2>
<div class="triangle-right" style="width:220px;"></div>
@if(Auth::user()->role_id == 1):
  <br>
  <button class="btn btn-lg btn-add"><span class="glyphicon glyphicon-plus"></span> Add Miscellaneous</button> 
@endif
<hr>
<table id="dataTable" class="table table-striped table-miscellaneous-and-other-fees table-default">
  <thead>
      <tr>
        <th scope="col">Item Image</th>
        <th scope="col">Item Name</th>
        <th scope="col">Item Description</th>
        <th scope="col">Item Price</th>
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
        <h4 align="center" style="margin:0;">Are you sure you want to remove this item?</h4>
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
        url: '/miscellaneous-and-other-fees/classes/' + num,
        type: 'GET'
      },
      columns:[
        {
          data: 'item_image',
          name: 'item_image',
          orderable: false
        },
        {
          data: 'item_code',
          name: 'item_code'
        },
        {
          data: 'item_description',
          name: 'item_description'
        },
        {
          data: 'item_price',
          name: 'item_price'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false
        }
      ]
    })
  }
  $(document).ready(function() {
    
    setTable();

    $('.btn-add').click(function () {
      window.location = "/miscellaneous-and-other-fees/create";
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
        url: '/miscellaneous-and-other-fees/' + id,
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