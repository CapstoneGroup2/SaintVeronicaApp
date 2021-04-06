<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} - Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    body {
        background-color: white !important;
        margin-top: 80px !important;
        font-size: 13px !important;
        font-family: Arial;
    }

    .btn {
        cursor: pointer;
        background-color: #3f704d;
        color: #FCF4A3;
    }

    #btn1 {
        position: absolute;
        top: 90%;
        left: 38%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        width: 11%;
    }

    #btn2 {
        position: absolute;
        top: 90%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        width: 11%;
    }

    #btn3 {
        position: absolute;
        top: 90%;
        left: 62%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        width: 11%;
    }

    .btn:hover {
        background-color: #FCF4A3;
        border-color: #3f704d;
    }

    .glyphicon {
        font-size: 60px;
        color: #FCF4A3;
    }

    .glyphicon:hover {
        color: #3f704d;
    }

    footer {
        width: 100%;
        padding: 15px;
        background-color: #3f704d;
        color: #FCF4A3;
        text-align: center;
    }

    #aboutUsText {
        font-size: 23px;
        color: #3f704d;
        text-align: center;
        margin-right: 15px;
        margin-left: 15px;
        /* border-left: 2px solid #3f704d; */
    }

    #text {
        font-size: 23px;
        color: #3f704d;
        text-align: center;
        margin-right: 15px;
        margin-left: 15px;
        /* border-right: 2px solid #3f704d; */
    }

    #aboutUs {
        color: #3f704d;
        text-align: center;
    }

    #carousel {
        /* margin-right: 25px;
        margin-left: 25px; */
    }

    #demo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        width: 100%;
        text-align: center;
        color: white;
        font-size: 50px;
    }

    #announcementModal {
        /* position: absolute; */
        /* float: left; */
        left: 50%;
        top: 65%;
        transform: translate(-50%, -50%);
    }

    #cursor {
        position: absolute;
        top: 50%;
        left: 63%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background: transparent;
        line-height: 40px;
        margin-left: 3px;
        -webkit-animation: blink 0.8s infinite;
        width: 5px;
        height: 50px;
    }

    @-webkit-keyframes blink {
        0% {
            background: transparent
        }

        50% {
            background: white
        }

        100% {
            background: transparent
        }
    }

    .btn-login {
        border-color: #28a745 !important;
    }

    .btn-group .btn-login:hover {
        background-color: #28a745 !important;
    }

    </style>
</head>

<body onload="onload()">
    <nav class="header navbar fixed-top navbar-expand-lg">
        <a href="/welcome" class="navbar-brand logo"><img id="logo-navbar" src="{{ URL::to('/images/logo.jpg') }}">St. Veronica Learning Center</a>
        <div class="btn-group" style="margin: 0 20px 0 auto;">
            <a href="/login" role="button" class="btn btn-success btn-login" style="color: white !important; letter-spacing: 2px;"><span class="glyphicon glyphicon-log-in" style="font-size: 15px; color: white !important;"></span> Login</a>
        </div>
    </nav>
    <div id="carousel">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ URL::to('/images/kid.jpg')}}" alt="kid" width="100%" height="600">
                </div>
                <div class="item">
                    <img src="{{ URL::to('/images/kids.jpg')}}" alt="kids" width="100%" height="600">
                </div>
                <div class="item">
                    <img src="{{ URL::to('/images/nursery.jpg')}}" alt="kids" width="100%" height="600">
                </div>
            </div>


            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <p id="demo">
            <div id="cursor"></div>
        </p>
        <button type="button" class="btn btn-variant btn-lg" id="btn1" onclick="location.href='#mv'"><b><i
                    class="glyphicon glyphicon-education"></i><br />Mission & Vision</b></button>
        <button type="button" class="btn btn-variant btn-lg" id="btn2" onclick="location.href='#aboutUs'"><b><i
                    class="glyphicon glyphicon-info-sign"></i><br />About Us</b></button>
        <button type="button" class="btn btn-variant btn-lg" id="btn3" data-toggle="modal"
            data-target="#myModal"><b><i
                    class="glyphicon glyphicon-bullhorn"></i></i><br />Announcements</b></button>
    </div>
    <div>
    <br/><br/><br/><br/>
        <table style="table-layout: fixed; width:100%;">
            <tr>
                <td colspan="6" align="center"><img src="{{ URL::to('/images/clipart.png')}}" alt="logo" width="300"
                        height="250"></td>
                <td colspan="6">
                    <h1 class="display-4" id="aboutUs">About us!</h1><br />
                    <p id="aboutUsText">We have created a fictional band website. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamc</p>
                </td>
            </tr>
            <tr style="margin-top:10%">
                <td colspan="12" align="center"> <br/><br/><br/><br/><img src="{{ URL::to('/images/login.jpg')}}" alt="logo" width="800"
                        height="600"></td>
            </tr>
            <tr id="mv">
                <td colspan="6" style="margin-top:10%;"> <br/><br/><br/><br/>
                    <h1 class="display-4" id="aboutUs">Mission</h1><br />
                    <p id="aboutUsText">We have created a fictional band website. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamc</p>
                </td>
                <td colspan="6" align="center" style="padding-top:10%;"> <br/><br/><br/><br/><img src="{{ URL::to('/images/mission.png')}}"
                        alt="logo" width="400" height="250"></td>
            </tr>
            <tr id="" style="padding-top:10%">
                <td colspan="6" align="center"><img src="{{ URL::to('/images/vision.png')}}" alt="logo" width="400"
                        height="250"></td>
                <td colspan="6">
                    <h1 class="display-4" id="aboutUs">Vision</h1><br />
                    <p id="aboutUsText">We have created a fictional band website. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamc</p>
                </td>
            </tr>
        </table>
        <br/><br/><br/><br/>
        <table style="table-layout: fixed; width:100%; margin-top:20px;">
            <tr>
                <td colspan="12" align="center">
                    <h1 class="display-4" id="aboutUs">OUR</h1><br /><img src="{{ URL::to('/images/values.png')}}"
                        alt="logo" width="400" height="100">
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <p id="aboutUsText">We have created a fictional band website. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamc</p>
                </td>
            </tr>
        </table>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">ANNOUNCEMENTS</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Opps no announcements!
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <footer class="footer">

        <!-- Messenger Chat Plugin Code -->
        <div id="fb-root"></div>
        <script>
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
        </script>

        <!-- Your Chat Plugin code -->
        <div class="fb-customerchat"
            attribution="page_inbox"
            page_id="103971228472620">
        </div>

        <p><b>Contact Us</b></p>
        <p>Facebook Page: Saint Veronica Learning Center</p>
        <p>Phone Number: +639-3213-2132</p>
        <p>Email: saintVeronicalearningCenter@gmail.com</p>

    </footer>

    <script>
    var i = 0;
    var txt = 'Get to know us!';
    var speed = 80;
    document.getElementById("cursor").style.visibility = "hidden";

    function onload() {
        if (i < txt.length) {
            document.getElementById("demo").innerHTML += txt.charAt(i);
            i++;
            setTimeout(onload, speed);
            if (i === txt.length) {
                document.getElementById("cursor").style.visibility = "visible";
            }
        }

    }
    </script>
    
</body>

</html>