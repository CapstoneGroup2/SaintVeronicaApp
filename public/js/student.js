$(document).ready(function(){
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

    $('#birthDate').attr({max:today})

    $('.btn-remove').click(function() {
        var id = $(this).parent().parent('tr').attr('id');
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
			url: '/students/' + id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token
            },
			success: function(dataResult){
                console.log("succcess");
                location.reload(true);
			}
		});
    })
});