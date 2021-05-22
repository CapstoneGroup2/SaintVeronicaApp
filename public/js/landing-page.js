var i = 0;
var txt = 'Get to know us!';
var speed = 80;

window.fbAsyncInit = function() {
    FB.init({
        xfbml            : true,
        version          : 'v10.0'
    });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
    
function onload() {
    if (i < txt.length) {
        document.getElementById("demo").innerHTML += txt.charAt(i);
        i++;
        setTimeout(onload, speed);
    }
}
function showImage(imgPath, imgText, galleryId) { 
    var curImage = document.getElementById('currentImg-' + galleryId);      
    curImage.src = imgPath;
    curImage.alt = imgText;
    curImage.title = imgText;
}
function changeActiveState(value) { 
    var el = document.getElementById('carousel-' + value);
    var list = el.getElementsByTagName("img");
    var curImage = document.getElementById('currentImg-' + value);      
    curImage.src = list[1].src;
    curImage.alt = list[1].alt;
    curImage.title = list[1].alt;
    var arr = document.getElementsByClassName('carousel-item');
    for (var i = 0; i < arr.length; i++){
        arr[i].classList.remove('active');  
    }
    el.classList.add('active');  
}

$(document).ready(function () {
    $('#toTopBtn').fadeOut();
    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) {
        $('#toTopBtn').fadeIn();
        } else {
        $('#toTopBtn').fadeOut();
        }
        });
        
        $('#toTopBtn').click(function() {
        $("html, body").animate({
        scrollTop: 0
        }, 500);
        return false;
        });
    $(document).on('click', '.btn-showModal', function() {
        $('#announcementModal').modal('show');
    });
});