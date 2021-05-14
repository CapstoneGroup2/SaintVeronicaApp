$(document).ready(function () {
    $(".toggle-password").click(function() {

        $(this).toggleClass("glyphicon glyphicon-eye-close");
        var input = $($(this).attr("toggle"));
        console.log(input)
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
})