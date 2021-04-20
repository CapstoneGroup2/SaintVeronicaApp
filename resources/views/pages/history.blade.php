@extends('layouts.app')

@section('title')
History of Payments
@endsection

@section('content')
<div class="sticky">
  <h2 style="text-align: left">History of Payments</h2>
  <div class="triangle-right" style="width:320px;"></div>
</div>
<hr>
<table id="dataTable" class="table table-striped table-enrollment table-default">
  <thead>
      <tr>
      <th scope="col" class="sticky" style="top: 120px !important;">Date Paid</th>
      <th scope="col" class="sticky" style="top: 120px !important;">Student Name</th>
      <th scope="col" class="sticky" style="top: 120px !important;">Amount Paid</th>
      <th scope="col" class="sticky" style="top: 120px !important;">Received By</th>
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
      url: '/payments-history',
      type: 'GET'
    },
    columns:[
      {
        data: 'date_paid',
        name: 'date_paid'
      },
      {
        data: 'student_name',
        name: 'student_name'
      },
      {
        data: 'amount_paid',
        name: 'amount_paid'
      },
      {
        data: 'user_name',
        name: 'user_name'
      }
    ]
  })
}
$(document).ready(function() {
  setTable();

});

</script>
@endsection