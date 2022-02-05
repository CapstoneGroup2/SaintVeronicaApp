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
            data: 'code',
            name: 'code'
        },
        {
            data: 'item',
            name: 'item'
        },
        {
            data: 'price',
            name: 'price'
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

    $(document).on('click', '.btn-add', function() {
        $('#addModal').modal('show');
    });

    $('[data-toggle="tooltip"]').tooltip();  

    var id;

    $(document).on('click', '.btn-remove', function() {
        id= $(this).attr('id');
        itemCode = $(this).parent('div').attr('id');
        $('#itemCode').html(itemCode);
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