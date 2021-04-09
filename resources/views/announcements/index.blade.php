@extends('layouts.app')

@section('title')
Announcements
@endsection

@section('content')

@if ($errors->has('announcement_title') || $errors->has('announcement_message'))
    <script>
        console.log('sdkjbsjbhf');
        $(document).ready(function() {
            $('#addModal').modal('show');
        });
    </script>
@endif

<h2 style="text-align: left;">Announcements</h2> 
<div class="triangle-right" style="width:260px;"></div>

@if(isset(Auth::user()->user_email) && Auth::user()->role_id == 1)
    <br>
    <button role="button" class="btn btn-lg btn-add"><span class="glyphicon glyphicon-plus"></span> Add Announcements</button>
@endif

<hr>

@foreach($announcements as $announcement)
    <div class="card card-home">
        <div class="card-body">
            <h2 class="card-text text-success">{{ $announcement -> announcement_title }}</h2>
            <p style="font-size: 1.2rem;">Date Posted: {{ date("M jS, Y H:i:s", strtotime($announcement -> updated_at)) }}</p>
            <h4 class="card-text text-info" style="margin: 30px;">{{ $announcement -> announcement_message}}</h4>
            @if (isset(Auth::user()->user_email) && Auth::user()->role_id == 1)
                <a href="/announcements/{{ $announcement->id }}/edit" class="btn btn-md btn-warning" role="button">Edit</a>
                <button id="{{ $announcement->id }}" class="btn btn-md btn-danger btn-remove">Remove</button>
            @endif
        </div>
    </div>
@endforeach

<div id="addModal" class="modal fade" role="dialog" style="margin-top: 70px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="enrollment-form" action="/announcements" method="post" enctype="multipart/form-data" style="padding: 50px">
        @csrf
        <div class="modal-header">
            <h2 class="text-warning">Add Announcement</h2> 
        </div>
        <div class="modal-body">
            <br>
            <div class="form-group">
                <label for="status">Announcement Title</label>
                <input type="text" class="form-control" name="announcement_title" value="{{ old('announcement_title') }}">
                @if ($errors->has('announcement_title'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('announcement_title')}}</p>
                    </span>
                @endif
            </div>
            <br>
            <div class="form-group">
                <label for="status">Announcement Message</label>
                <textarea type="text" class="form-control" name="announcement_message">{{ old('announcement_message') }}</textarea>
                @if ($errors->has('announcement_message'))
                    <span class="invalid feedback" role="alert">
                        <p style="color:tomato;">{{$errors->first('announcement_message')}}</p>
                    </span>
                @endif
            </div>
            <br>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-lg btn-danger" role="button">Cancel</button>
            <button type="submit" class="btn btn-lg btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

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

    });
</script>

@endsection