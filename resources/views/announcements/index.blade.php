@extends('layouts.app')

@section('title')
Announcements
@endsection

@section('content')

<h2 style="text-align: left;">Announcements</h2> 
<div class="triangle-right" style="width:260px;"></div>
<br>
<button role="button" class="btn btn-lg btn-add"><span class="glyphicon glyphicon-plus"></span> Add Announcements</button>
    <hr>

    @foreach($announcements as $announcements)
    <div class= "row">
        <div class="col">
            <div class="card card-home" style= "margin: 35px 45px 10px 85px;">
                <div class="card-body">
                    <h2 class="card-text text-danger">{{ $announcements -> announcement_title }}</h2>
                    <h4 class="card-text text-info" style= "text-align:left; margin:20px 0px 25px 19px">{{ $announcements -> announcement_message}}</h4>
                    <a href="#" class="btn btn-md btn-warning" role="button">Edit</a>
                    <button class="btn btn-md btn-danger btn-remove">Remove</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection

@section('script')  

<script>
  $(document).ready(function() {
    
    $(document).on('click', '.btn-add', function() {
        $('#addModal').modal('show');
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
</script>

@endsection