@extends('layouts.app')

@section('title')
Students
@endsection

@section('content')
  <table id="dataTable" class="table table-striped table-enrollment table-default">
    <div class="row">
      <div class="col">
        <h2 style="text-align: left"></h2> 
      </div>
      <div class="col">
        <button role="button" class="btn btn-lg btn-add" style="margin: 0 0 0 500px">Enroll Student</button>
      </div>
    </div>
    <hr>
    <thead>
        <tr>
        <th scope="col" width="10%">ID No.</th>
        <th scope="col" width="20%">Full Name</th>
        <th scope="col" width="20%">Email Address</th>
        <th scope="col" width="15%">Home Contact</th>
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
    if(pathname.includes('gradelevels')) {
      category = 'gradelevels';
      if(num==2)
        $('h2').text('Nursery Students');
      else if(num==3)
        $('h2').text('Nursery 2 Students');
      else if(num==4)
        $('h2').text('Kinder 1 Students');
      else if(num==5)
        $('h2').text('Kinder 2 Students');
      else if(num==6)
        $('h2').text('Grade 1 Students');
      else if(num==7)
        $('h2').text('Grade 2 Students');
      else if(num==8)
        $('h2').text('Grade 3 Students');
      else if(num==9)
        $('h2').text('Grade 4 Students');
      else if(num==10)
        $('h2').text('Grade 5 Students');
      else if(num==11)
        $('h2').text('Grade 6 Students');
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
        url: '/students/' + category + '/' + num,
        type: 'GET'
      },
      columns:[
        {
          data: 'id',
          name: 'id'
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
          data: 'student_home_contact',
          name: 'student_home_contact'
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
      window.location = "/students/" + category + "/" + num + "/create";
    })
  });
  
  </script>
@endsection
