@extends('layouts.app')

@section('title')
Miscellaneous & Other Fees
@endsection

@section('content')
  <table id="dataTable" class="table table-striped table-miscellaneous-and-other-fees table-default">
    <div class="row">
      <div class="col">
        <h2 style="text-align: left"></h2> 
      </div>
      <div class="col">
        <button role="button" class="btn btn-lg btn-add" style="margin: 0 0 0 500px">Add Miscellaneous</button>
      </div>
    </div>
    <hr>
    <thead>
        <tr>
        <th scope="col" width="10%">Image</th>
        <th scope="col" width="20%">Name</th>
        <th scope="col" width="20%">Description</th>
        <th scope="col" width="15%">Price</th>
        <th scope="col" width="15%" style="text-align:center">Action</th>
        </tr>
    </thead>
  </table>
@endsection

@section('script')    
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
  <script>
  var pathname = window.location.pathname;
  var num = window.location.pathname.slice(window.location.pathname.lastIndexOf('/') + 1);
  var category = '';
  function setTitle() {
    if(pathname.includes('grade-levels')) {
      category = 'grade-levels';
      if(num==1)
        $('h2').text('Nursery Miscellaneous & Other Fees');
      else if(num==2)
        $('h2').text('Nursery 2 Miscellaneous & Other Fees');
      else if(num==3)
        $('h2').text('Kinder 1 Miscellaneous & Other Fees');
      else if(num==4)
        $('h2').text('Kinder 2 Miscellaneous & Other Fees');
      else if(num==5)
        $('h2').text('Grade 1 Miscellaneous & Other Fees');
      else if(num==6)
        $('h2').text('Grade 2 Miscellaneous & Other Fees');
      else if(num==7)
        $('h2').text('Grade 3 Miscellaneous & Other Fees');
      else if(num==8)
        $('h2').text('Grade 4 Miscellaneous & Other Fees');
      else if(num==9)
        $('h2').text('Grade 5 Miscellaneous & Other Fees');
      else if(num==10)
        $('h2').text('Grade 6 Miscellaneous & Other Fees');
    }
    else if(pathname.includes('tutorials')) {
      category = 'tutorials';
      if(num==2)
        $('h2').text('Music Tutees');
      else if(num==3)
        $('h2').text('Piano Tutees');
    }
  }
  function setTable() {
    $('#dataTable').DataTable({
      processing: true,
      serverSide: true,
      ajax:{
        url: '/miscellaneous-and-other-fees/' + category + '/' + num,
        type: 'GET'
      },
      columns:[
        {
          data: 'image',
          name: 'image',
          orderable: false
        },
        {
          data: 'miscellaneous_and_other_fee_name',
          name: 'miscellaneous_and_other_fee_name'
        },
        {
          data: 'miscellaneous_and_other_fee_description',
          name: 'miscellaneous_and_other_fee_description'
        },
        {
          data: 'miscellaneous_and_other_fee_price',
          name: 'miscellaneous_and_other_fee_price'
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
    setTitle();
    setTable();
    $('.btn-add').click(function () {
      window.location = "/miscellaneous-and-other-fees/create";
    })
  });
  
  </script>
@endsection