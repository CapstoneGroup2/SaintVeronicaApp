$(document).ready(function() {
    $(document).on('click', '.btn-addClass', function() {
        $('#addClassModal').modal('show');
    });

    $(document).on('click', '.btn-remove', function() {
        id= $(this).attr('id');
        className = $(this).parent('div').attr('id');
        if ($(this).parent('div').parent('div').attr('id') != 0) {
            alert(className + ' class is not allowed to be deleted!');
        } else {
            $('#className').html(className);
            $('#confirmModal').modal('show');
        }
    });
    
    $('#btn-ok').click(function() {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: '/classes/' + id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token
            },
            success: function(dataResult){
                location.reload(true);
            }
        });
    });
});