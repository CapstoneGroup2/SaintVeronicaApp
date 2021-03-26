$(document).ready(function(){
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