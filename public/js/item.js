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