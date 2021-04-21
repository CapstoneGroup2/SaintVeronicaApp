<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} - Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/landing_page.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body onload="onload()">
    <nav class="header navbar fixed-top navbar-expand-lg">
        <a href="/welcome" class="navbar-brand logo"><img id="logo-navbar" src="{{ URL::to('/images/logo.jpg') }}">St. Veronica Learning Center</a>
        <div class="btn-group" style="margin: 0 20px 0 auto;">
            <a href="/login" role="button" class="btn btn-success" style="color: white !important; letter-spacing: 2px;"><span class="glyphicon glyphicon-log-in" style="font-size: 15px; color: white !important;"></span> Login</a>
        </div>
    </nav>
    
    <div class="jumbotron">
        <h1 class="display-4" id="demo"></h1>
        <!-- <p class="lead">Enroll your kids now and be part of the growing family!</p> -->
        <hr class="my-4" style="width: 500px;">
        <p style="font-style:italic;">Preparing children for future success in life.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" onclick="location.href='#div-aboutUs'" role="button">About Us <br/><i
                        class="glyphicon glyphicon-info-sign"></i></a>
            <a class="btn btn-primary btn-lg" onclick="location.href='#div-info'" role="button">Mission and Vision<br/><i
                        class="glyphicon glyphicon-education"></i></a>
            <a class="btn btn-primary btn-lg" role="button">Announcements <br/><i
                        class="glyphicon glyphicon-bullhorn"></i></a>
        </p>
        <p style="font-size: 10px; float: right; color: black;">Photo taken from Pinterest.</p>
    </div>
    <div id="div-aboutUs" style="overflow-x:auto;">
        <br /><br /><br/><br/>
        <table style="table-layout: fixed; width:100%;">
            <tr id="aboutUs">
                <td colspan="6" align="center"><img src="{{URL::to('/images/login.jpg')}}" alt="logo" style="width:100%;
                        height:auto;" id="aboutimg"></td>
                <td colspan="12">
                    <h2 style="font-size: 20px; color: #ff9900;">About Us</h2><br/><br/>
                    <div>
                        <p id="aboutUsText">We have created a fictional band website. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamc</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="container">
        
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            <div class="item active">
                <div class="row">
                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/tutorial3.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card card-block card-2"><img class="card-img-top" src="/images/tutorial2.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/tutorial1.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/pic1.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row">
                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/pic2.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/pic3.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/pic4.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/pic5.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="item">
                <div class="row">
                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/pic6.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/pic7.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/pic8.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card card-block card-1"><img class="card-img-top" src="/images/logo.jpg" alt="Card image cap" style="width: 100%; height: 400px;">
                            <h5 class="card-title">Piano Tutorial</h5>
                            <div class="overlay">
                                <div class="text">We offer Piano tutorials to students from our school or not.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div id="div-info" style="padding: 5% 0;margin: 5% 0;">
        <table style="table-layout: fixed; width:100%;" id="info">
            <tr>
                <td colspan="6" style="border-right: 2px solid green" align="right"><h2 style="font-size: 20px; color: #ff9900;">Our Vision</h2></td>
                <td colspan="6" align=""><p style="margin-left:30px; margin-right:50px;"><i style="font-size: 27px; color: #ff9900">Positive</i>, <i>caring relationships based on trust and respect, are at the heart of our philosophy.
                We have a clear vision of what we want to achieve at St. Veronica Learning Center (SVLC):</i><br/>
                    <i class="glyphicon glyphicon-star-empty"  style="font-size: 27px; color: #ff9900"></i> to provide a safe, happy, caring, secure and stimulating environment for your child .
                    <br/><i class="glyphicon glyphicon-star-empty" style="font-size: 27px; color: #ff9900"></i> to enable at children to develop their capabilities as a successful learners, confident 	individuals, responsible citezens and effective contributors to society.
                    <br/><i class="glyphicon glyphicon-star-empty" style="font-size: 27px; color: #ff9900"></i> to help all children to prepare for the future. Veronican Private Pre-Primary School: 	
                    a place to learn, develop and grow <i>"happy healthy children"</i></p>
                </td>
            </tr>
            <tr>
                <td colspan="12" align="center"><i class="glyphicon glyphicon-education" style="color:#3f704d; font-size: 60px;"></i></td>
            </tr>
            <tr>
                <td colspan="6" style="border-right: 2px solid green" align="center" style="margin-left:20px; margin-right:20px;"><p style="margin-left:30px; margin-right:50px;">
                At <i style="font-size: 27px; color: #ff9900">Veronican</i> Private Pre-Primary School, we believe that every day is a learning day and that learning is all around us. As well as being a place of learning, we pride ourselves on ensuring that all children are coming in to a loving, caring environment where they are valued and listened to.
                </p></td>
                <td colspan="6" align="center"><h2 style="font-size: 20px; color: #ff9900;">Our Aims</h2>
                </td>
            </tr>
            <tr>
                <td colspan="12" align="center"><img src="{{ URL::to('/images/logo.png')}}" alt="logo" style="width:70px;
                        height:70px;"></td>
            </tr>
            <tr>
                <td colspan="6" style="border-right: 2px solid green" align="right"><h2 style="font-size: 20px; color: #ff9900;">Outcomes and Success</h2></td>
                <td colspan="6" align="" style="margin-left:20px; margin-right:20px;"><p style="margin-left:20px;"><i>We aim to focus on outcomes and maximize success for all children by:</i>
                <br/><br/><i class="glyphicon glyphicon-check"  style="font-size: 20px; color: #ff9900"></i> Exploring new ideas and technologies 
                <br/><i class="glyphicon glyphicon-check"  style="font-size: 20px; color: #ff9900"></i> Providing quality resources
                <br/><i class="glyphicon glyphicon-check"  style="font-size: 20px; color: #ff9900"></i> Agreeing targets for learning
                <br/><i class="glyphicon glyphicon-check"  style="font-size: 20px; color: #ff9900"></i> Providing appropriate feedback
                <br/><i class="glyphicon glyphicon-check"  style="font-size: 20px; color: #ff9900"></i> Ongoing assessment and evaluation
                <br/><i class="glyphicon glyphicon-check"  style="font-size: 20px; color: #ff9900"></i> Reflecting on individual progress
                <br/><i class="glyphicon glyphicon-check"  style="font-size: 20px; color: #ff9900"></i> Raising attainment and celebrating achievement
                <br/><i class="glyphicon glyphicon-check"  style="font-size: 20px; color: #ff9900"></i> Delivering a high quality  curriculum
                </p>
                </td>
            </tr>
            <tr>
                <td colspan="12" align="center"><i class="glyphicon glyphicon-heart" style="color:#3f704d; font-size: 50px;"></i></td>
            </tr>
            <tr>
                <td colspan="6" style="border-right: 2px solid green" align="" style="margin-left:20px; margin-right:20px;"><p style="margin-left:20px; margin-right:20px;"><i>We have a clear understanding of our values at Veronican Private Pre-Primary School:</i>
                <br/><i style="font-size: 20px; color: #ff9900">HAPPINESS AND WELL-BEING</i> - showing kindness
                <br/><i style="font-size: 20px; color: #ff9900">ENGAGEMENT</i> - being involved, resposnive, interested and interesting
                <br/><i style="font-size: 20px; color: #ff9900">RESPECT</i> - promoting a culture of tolerance, inclusion, diversity, equality, fairness 	and oppurtunity
                <br/><i style="font-size: 20px; color: #ff9900">COMMUNICATION</i> - being genuine, open, honest and sincere
                <br/><i style="font-size: 20px; color: #ff9900">ACHIEVEMENT</i> - highest quality, high expectations, aiming high
                <br/><i style="font-size: 20px; color: #ff9900">INTEGRITY</i> - means doing the right thing, even when no one else is watching
                <br/><i style="font-size: 20px; color: #ff9900">PARTNERSHIP AND CARE</i> - being reflective and learning from parents as partners, 	developing strong nurturing relationships
                <br/><i style="font-size: 20px; color: #ff9900">CHALLENGING</i> - testing purselves and those around us, not accepting the status quo
                <br/><i style="font-size: 20px; color: #ff9900">COMMITMENT TO EXCELLENCE</i> - developing skills for learning, life and work.
                </p></td>
                <td colspan="6" align="center"><h2 style="font-size: 20px; color: #ff9900;">Core Values</h2>
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
                    <h3 class="modal-title">ANNOUNCEMENTS</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    @foreach($announcements as $announcement)
                        <div class="card card-home">
                            <div class="card-body">
                                <h2 class="card-text text-danger" style="font-size: 2rem !important;">{{ $announcement -> announcement_title }}</h2>
                                <p style="font-size: 1.2rem;">{{ date("l, jS \of F Y, h:i:s A", strtotime($announcement -> updated_at)) }}</p>
                                <h4 class="card-text text-info" style="margin: 5px;font-size: 1.5rem !important;">{{ $announcement -> announcement_message}}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
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

        <!-- <p><b>Contact Us</b></p> -->
        <p>Facebook Page: Saint Veronica Learning Center</p>
        <p>Phone Number: +639178780506</p>
        <p>Location: Jarabe Bldg., Bantug St., Tagnipa Maasin City, Southern Leyte</p>  

    </footer>

    <script src="/js/landing-page.js"></script>
    
</body>

</html>