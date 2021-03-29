@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')
<h2 style="text-align: left">{{ session()->get('present_class_name') }} Class</h2>
<div class="triangle-right" style="width:220px;"></div>
<hr>
<table id="dataTable" class="table table-striped table-miscellaneous-and-other-fees table-default">
  <thead>
      <tr>
        <th scope="col">Item Image</th>
        <th scope="col">Item Name</th>
        <th scope="col">Item Description</th>
        <th scope="col">Item Price</th>
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
      ]
    })
}

$(document).ready(function() {
    setTable();
});
  
</script>
@endsection