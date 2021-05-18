$(document).ready(function() {

    $(document).on('click', '.btn-add', function() {
        $('#addModal').modal('show');
    });

    $('[data-toggle="tooltip"]').tooltip();  

    var id;

    $(document).on('click', '.btn-remove', function() {
        id= $(this).attr('id');
        title = $(this).parent('div').parent('div').attr('id');
        $('#title').html(title);
        $('#confirmModal').modal('show');
    });

    $('#btn-ok').click(function() {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: '/announcements/' + id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token
            },
            beforeSend:function() {
                $('#btn-ok').text('Deleting...');
            },
            success: function(data) {
                $('#confirmModal').modal('hide');
                $('#btn-ok').text('OK');
                location.reload();
            }
        });
    });
});