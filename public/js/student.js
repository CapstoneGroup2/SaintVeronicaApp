var pathname = window.location.pathname;
var num = window.location.pathname.slice(window.location.pathname.lastIndexOf('/') + 1);

function setTable() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
        url: '/students/classes/' + num,
        type: 'GET'
        },
        columns:[
        {
            data: 'student_id',
            name: 'student_id'
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
            data: 'student_address',
            name: 'student_address'
        },
        {
            data: 'student_home_contact',
            name: 'student_home_contact'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
        }
        ]
    })
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profileImage')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {

    let date = new Date()
    
    year = date.getFullYear();
    month = date.getMonth()+1;
    day = date.getDate();

    if (day < 10) {
        day = '0' + day;
    }

    if (month < 10) {
        month = '0' + month;
    }

    let today = year+"-"+month+"-"+day

    setTable();

    $("#loader").hide();

    $('#birthDate').attr({max:today});

    $('#btn-add').click(function () {
        window.location = "/students/create";
    });

    $('#btn-import').click(function () {
        window.location = "/students/classes/import";
    });

    $('#btn-export').click(function () {
        window.location = "/students/classes/export";
    });

    $('[data-toggle="tooltip"]').tooltip(); 

    var id;

    $(document).on('click', '.btn-remove', function() {
        id= $(this).attr('id');
        $('#idnum').html(id);
        $('#confirmModal').modal('show');
    });
            
    $(document).on('click', '.btn-admission', function() {
        for (var i = 0; i < Object.keys(payments).length; i++) {
        console.log(payments[i].student_id);
        if (payments[i].student_id == $(this).attr('id')) {
            if(payments[i].balance_due <= 0) {
            $('#enrollment-form').attr('action', '/admission/' + $(this).attr('id'));
            $('#student_id').val($(this).attr('id'));
            $('#admissionModal').modal('show');
            } else {
            alert('Student is not yet allowed for admission!');
            }
        }
        }
    });

    $('#btn-ok').click(function() {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
        url: '/students/' + id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token
        },
        beforeSend: function(){
            $('#confirmModal').modal('hide');
            $("#loader").show();
            $('table').hide();
        },
        success: function(dataResult){
            location.reload(true);
        }
        });
    })

    // $('input[name="student_birth_date"]').change(function () {  
    //     var setDate = $('input[name="student_birth_date"]').val().split("-");
    //     $('input[name="student_age"]').val(Math.abs(parseInt(new Date().getFullYear(), 10) - parseInt(setDate, 10)));
    // });  

});