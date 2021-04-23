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
});