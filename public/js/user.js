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

$(document).ready(function () {
    
    $(".toggle-password").click(function() {
        $(this).toggleClass("glyphicon glyphicon-eye-close");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });
    
    $(".toggle-confirmation").click(function() {
        $(this).toggleClass("glyphicon glyphicon-eye-close");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
    });
})