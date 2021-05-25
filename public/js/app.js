var dropdown = document.getElementsByClassName("dropdown-btn")

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}

function openNav() 
{
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("main").style.paddingLeft = "260px";
    document.getElementById("toggle").style.display = "none";
}

function closeNav() 
{
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("main").style.paddingLeft= "10px";
    document.getElementById("toggle").style.display = "block";
}

$(document).ready(function () {

    if (sessionStorage.getItem("active") == null) {
        sessionStorage.setItem("active", '#1');
    }

    if(sessionStorage.getItem('active') == '#1') {
        $(sessionStorage.getItem("active")).addClass('active');
    }
    
    if(sessionStorage.getItem('active') == '#2') {
        $(sessionStorage.getItem("active")).addClass('active');
        document.getElementById("2").nextElementSibling.style.display = "block";
    }

    if(sessionStorage.getItem('active') == '#3') {
        $(sessionStorage.getItem("active")).addClass('active');
        document.getElementById("3").nextElementSibling.style.display = "block";
    }
    
    if(sessionStorage.getItem('active') == '#4') {
        $(sessionStorage.getItem("active")).addClass('active');
        document.getElementById("4").nextElementSibling.style.display = "block";
    }

    if(sessionStorage.getItem('active') == '#5') {
        $(sessionStorage.getItem("active")).addClass('active');
    }
    
    if(sessionStorage.getItem('active') == '#6') {
        $(sessionStorage.getItem("active")).addClass('active');
    }

    $('#1').click( function() {
        $(sessionStorage.getItem("active")).removeClass("active");
        sessionStorage.setItem("active", "#1");
    });

    $('#2').click( function() {
        $(sessionStorage.getItem("active")).removeClass('active');
        sessionStorage.setItem("active", "#2");
    });

    $('#3').click( function() {
        $(sessionStorage.getItem("active")).removeClass('active');
        sessionStorage.setItem("active", "#3");
    });

    $('#4').click( function() {
        $(sessionStorage.getItem("active")).removeClass('active');
        sessionStorage.setItem("active", "#4");
    });

    $('#5').click( function() {
        $(sessionStorage.getItem("active")).removeClass('active');
        sessionStorage.setItem("active", "#5");
    });

    $('#6').click( function() {
        $(sessionStorage.getItem("active")).removeClass('active');
        sessionStorage.setItem("active", "#6");
    });

    $('#21').click( function() {
        $(sessionStorage.getItem("active_dropdown")).removeClass('active');
        sessionStorage.setItem("active_dropdown", "#21");
    });

    $('#22').click( function() {
        $(sessionStorage.getItem("active_dropdown")).removeClass('active');
        sessionStorage.setItem("active_dropdown", "#22");
    });

    $('#btn-logout').click( function() {
        sessionStorage.removeItem("active");
    });
})