<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} - Welcome</title>
    <link rel="shortcut icon" href="/images/logo.png" />
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
    @if(isset(Auth::user()->user_email))
    @if(Auth::user()->role_id == 1)
    <script>
    window.location = "/dashboard";
    </script>
    @else
    <script>
    window.location = "/home";
    </script>
    @endif
    @endif
    <a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out"
        data-abc="true"></a>
    <nav class="header navbar fixed-top navbar-expand-lg">
        <a href="/welcome" class="navbar-brand logo"><img id="logo-navbar" src="{{ URL::to('/images/logo.jpg') }}">St.
            Veronica Learning Center</a>
        <div class="btn-group" style="margin: 0 20px 0 auto;">
            <a class="btn btn-primary btn-lg" onclick="location.href='#div-aboutUs'" role="button">About Us <br /></a>
            <a class="btn btn-primary btn-lg" onclick="location.href='#div-info'" role="button">Mission and
                Vision<br /></a>
            <a class="btn btn-primary btn-lg btn-showModal" role="button">Announcements <br /></a>
                <a href="/login" role="button" class="btn btn-primary btn-lg shadow mb-3 bg-white rounded"
                    style="color: white !important; background-color: #169143 !important;  border-color: #169143 !important;  border-shadow: letter-spacing: 2px;">Login</a>
        </div>
    </nav>

    <div class="jumbotron">
        <h1 class="display-4" style="margin-top:300px;" id="demo"></h1>
        <hr class="style-one" style="margin-right:1300px; padding-top:1px;">
        <p style="font-style:italic;">Preparing children for future success in life.</p>
        <p class="lead">

        </p>
        <p style="font-size: 12px; float: right; color: white;">Photo taken from Pinterest.</p>
    </div>
    <div style="overflow-x:auto;">
        <br /><br /><br /><br />
        <table style="table-layout: fixed; width:100%;">
            <tr>
                <td colspan="5" style="border-bottom: 2px solid #3f704d;"></td>
                <td colspan="3" align="center" style="padding:0;"><img src="{{ URL::to('/images/logo.png')}}" alt="logo"
                        style="width: 75px; height:70px;"></td>
                <td colspan="5" style="border-bottom: 2px solid #3f704d;"></td>
            </tr>
        </table>
        <h2 style="font-size: 20px; color: #ff9900; text-align: center;"><br /><b>The School Seal</b></h2><br />
        <table style="table-layout: fixed; width:100%;">
            <tr id="aboutUs">
                <td colspan="9">
                    <div id="section">
                        <div class="article">
                            <p id="aboutUsText" style='text-align: left; margin-left: 20px;'>
                                <b>The seal of St. Veronica Learning Center (SVLC)</b> consists concentric leaves circle
                                of laurel
                                encompassing the name of the School. A clover of each end of school name is Latin motto.
                                The shield is to protect the child, and inner shield is to protect the child,
                                and inner shield circumscribes a two religious logo which founded by a former Brother
                                <b><i>Randy Aniga.</i></b>
                                The inner logo of lower part which symbolize the main object of the school which is
                                education.
                                The year 2019 is the Foundation.
                                <i>
                                    <br />1. <b style="color: #ff9900;">The Circle laurel leaves</b> signifies unity,
                                    wholeness and infinity towards achieving education.

                                    <br />2. <b style="color: #ff9900;">The Shield</b> is to protect particular danger
                                    or risk that child maybe encounter.

                                    <br />3. <b style="color: #ff9900;">The Holy Face</b> education framed and
                                    interprets all of reality of the glory of God in the Face of Jesus Christ.

                                    <br />4. <b style="color: #ff9900;">The Book</b> symbolizes the knowledge, skills
                                    values and wisdom that pupils learn in school.

                                    <br />5. <b style="color: #ff9900;">The Pencil</b> is symbolizes of potential which
                                    give encouragement to every child.

                                    <br />6. <b style="color: #ff9900;">The CHILD</b> at is most basic level of
                                    education, encompasses all forms of education.

                                    <br />7. <b style="color: #ff9900;">The Latin</b> connotes the motto of the school
                                    <b style="color: #ff9900;">QOUD FILII DEI</b> which means the <b>CHILDREN of
                                        GOD.</b>

                                    <br />8. <b id="div-aboutUs" style="color: #ff9900;">The year 2019</b> saw the birth
                                    of the school from humble beginnings.

                                    <br />9. <b style="color: #ff9900;">The Wheat and the Cross</b> is symbolizes the
                                    prosperity, love and hope.
                                </i>
                            </p>
                        </div>

                    </div>
                </td>
                <td colspan="3" align="left"><img src="{{URL::to('/images/logo.jpg')}}" alt="logo"
                        style="width:100%; height:auto;" id="aboutimg"></td>
            </tr>
        </table>
        <table style="table-layout: fixed; width:100%;">
            <tr>
                <td colspan="5" style="border-bottom: 2px solid #3f704d;"></td>
                <td colspan="2" align="center"><i id="questionmark" class="glyphicon glyphicon-question-sign"
                        style="color:#3f704d; font-size: 60px;"></i></td>
                <td colspan="5" style="border-bottom: 2px solid #3f704d;"></td>
            </tr>
        </table>
        <table style="table-layout: fixed; width:100%;">
            <tr id="aboutUs">
                <td colspan="12">
                    <h2 style=" color: #ff9900;">About Us</h2><br /><br />
                    <div>
                        <pre>
 Our Preschool is well resourced, conducive to learning and has playful environment, where kids can also play and socialize with 
 their schoolmates. It is safe for it has a large fenced outdoor area as well as new classrooms. Children are given freedom for 
 at this age they are more on socializing and playful stage. SVLC operates a free flow system between the indoor and outdoor 
 environments and we make learning a fun way that assures your child development has been met.

 Topics and themes are carefully planned, that capture the children’s interest and imaginations and our experienced team, work hard
 to ensure the children are safe, happy and make excellent progress during their time with us.

 We develop positive relationships with the parents through our transition arrangements, home visits and value our parents as 
 partners to ensure the best possible start for your child within our Preschool.

 We welcome everyone to visit SVLC and we are happy to answer any questions and queries you might have.
 </pre>

                    </div>
                </td>

            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="6" align="center"><img src="{{URL::to('/images/logi    n.jpg')}}" alt="logo"
                        style="width:100%; height:auto;" id="aboutimg"></td>
                <td colspan="3"></td>
            </tr>
        </table>
        <table style="table-layout: fixed; width:100%;">
            <tr id="aboutUs">
                <td colspan="12" align="center">
                    <h2 style="font-size: 20px; color: #ff9900;"><i class="glyphicon glyphicon-time"
                            style="color:#3f704d; font-size: 60px;"></i><br /><b>A brief history of the School</b></h2>
                    <br />

                    <!-- <div id="section"> -->
                    <div class="article" style="margin-right: 50px;">

                        <p class="moretext" id="aboutUsText">
                        <pre>
 <b>St. Veronica Learning Center (SVLC)</b> began on August 8, 2018 as a Tutorial Center founded by <b>Randy Aniga</b>, a former religious brother.

 Since that time, the young children have their first formal educational experience at a formal school and have their tutorials in the 
 nurturing environment of ST. Veronica Learning Center. SVLC is a non sectarian school providing morning classes for 2-3 years of age and 
 extended classes for children 4 yrs of age.

 Our All-By-Myself program is a unique class that gives your 2 year old child an opportunity to experience preschool independently. 
 We offer an environment that enhances early learning, builds socialization skills, increase confidence and independence. 

 Classes are limited to 15 children and are staffed by a teacher and a Teacher’s Assistant. Children must be independent with bathroom needs 
 and meet age requirements by first of the school year.

 The purpose of St. Veronica Learning Center (SVLC) is to provide an organized learning experience for children to grow and learn physically, 
 socially, morale, spiritually and academically. We provide a loving atmosphere which promotes sharing and caring for others. St Veronica 
 Learning Center is an educational ministry of St. Veronica and model Christian values and helping Jesus.

 Although simple prayers will be shared, the program is not intended to be a religious educational program. Parents desiring formal religious 
 education for their children are encouraged to explore Sunday church school programs.

 The St. Veronica Learning Center Schools curriculum reflects Early Childhood Standards Develop by the Department of Education and 
 Public Welfare. In addition, St. Veronica Learning Center staffs are participating members of the Schools Districts Early Childhood Consortium.

 The curriculum at ST. Veronica Learning Center is coordinated with the compliments the Maasin City and City Social Welfare Office.

 Nursery program and the Early Childhood Care Development (ECCD) Education. Key objectives are obtained through stories, reading, writing, 
 center time, music games, art, play and both independent and group activities.

 Play is a vehicle through which children build knowledge children need safe environments where they can practice newly acquired skills and learn 
 new information. Our teachers support children’s learning opportunities by providing meaningful, theme related experience to engage their interest, 
 abilities and culture.
 </pre>

                    </div>
                </td>
            </tr>
        </table>
        <br /><br />
    </div>
    <div class="container-carousel">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/tutorial3.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">Academic Tutorial</h5>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card card-block card-2"><img class="card-img-top" src="/images/tutorial2.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">Morning Classes</h5>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/tutorial1.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">Piano Tutorial</h5>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/pic1.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">School Event</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="row">
                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/pic2.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">Christmas Party</h5>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/pic3.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">Tutees</h5>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/pic4.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">Christmas Party</h5>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/pic5.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">Academic Tutorial</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="row">
                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/pic6.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">Piano Tutorial</h5>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/pic7.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">One-on-one Tutorial</h5>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/pic8.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">Tutorial Sessions</h5>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card card-block card-1"><img class="card-img-top" src="/images/logo.jpg"
                                    alt="Card image cap">
                                <h4 class="card-title">SVLC Logo</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" style="margin-top: 170px !important"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" style="margin-top: 170px !important"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div id="div-info" style="padding: 5% 0;">
        <table style="table-layout: fixed; width:100%;" id="info">
            <tr>
                <td colspan="6" style="border-right: 2px solid green" align="right">
                    <h2 style=" color: #ff9900;">Our Vision</h2>
                </td>
                <td colspan="6" align="">
                    <p style="margin-left:30px; margin-right:50px;"><i
                            style="font-size: 25px; color: #ff9900">Positive</i>, <i>caring relationship based on trust
                            and respect, are at the heart of our philosophy.
                            We have a clear vision of what we want to achieve at St. Veronica Learning Center
                            (SVLC):</i><br />
                        <i class="glyphicon glyphicon-star-empty" style="font-size: 20px; color: #ff9900"></i> to
                        provide a safe, happy, caring, secure and stimulating environment for your child .
                        <br /><i class="glyphicon glyphicon-star-empty" style="font-size: 20px; color: #ff9900"></i> to
                        enable at children to develop their capabilities as a successful learners, confident
                        individuals, responsible citezens and effective contributors to society.
                        <br /><i class="glyphicon glyphicon-star-empty" style="font-size: 20px; color: #ff9900"></i> to
                        help all children to prepare for the future. Veronican Private Pre-Primary School:
                        a place to learn, develop and grow <i>"happy healthy children"</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="12" align="center"><i class="glyphicon glyphicon-education"
                        style="color:#3f704d; font-size: 60px;"></i></td>
            </tr>
            <tr>
                <td colspan="6" style="border-right: 2px solid green" align="center"
                    style="margin-left:18px; margin-right:18px;">
                    <p style="margin-left:30px; margin-right:50px;">
                        At <i style="font-size: 27px; color: #ff9900">Veronican</i> Private Pre-Primary School, we
                        believe that every day is a learning day and that learning is all around us. As well as being a
                        place of learning, we pride ourselves on ensuring that all children are coming in to a loving,
                        caring environment where they are valued and listened to.
                    </p>
                </td>
                <td colspan="6" align="center">
                    <h2 style=" color: #ff9900;">Our Aims</h2>
                </td>
            </tr>
            <tr>
                <td colspan="12" align="center"><img src="{{ URL::to('/images/logo.png')}}" alt="logo"
                        style="width: 75px; height:70px;"></td>
            </tr>
            <tr>
                <td colspan="6" style="border-right: 2px solid green" align="right">
                    <h2 style=" color: #ff9900;">Outcomes and Success</h2>
                </td>
                <td colspan="6" align="" style="margin-left:20px; margin-right:20px;">
                    <p style="margin-left:20px;"><i>We aim to focus on outcomes and maximize success for all children
                            by:</i>
                        <br /><br /><i class="glyphicon glyphicon-check" style=" color: #ff9900"></i> Exploring new
                        ideas and technologies
                        <br /><i class="glyphicon glyphicon-check" style=" color: #ff9900"></i> Providing quality
                        resources
                        <br /><i class="glyphicon glyphicon-check" style=" color: #ff9900"></i> Agreeing targets for
                        learning
                        <br /><i class="glyphicon glyphicon-check" style=" color: #ff9900"></i> Providing appropriate
                        feedback
                        <br /><i class="glyphicon glyphicon-check" style=" color: #ff9900"></i> Ongoing assessment and
                        evaluation
                        <br /><i class="glyphicon glyphicon-check" style=" color: #ff9900"></i> Reflecting on individual
                        progress
                        <br /><i class="glyphicon glyphicon-check" style=" color: #ff9900"></i> Raising attainment and
                        celebrating achievement
                        <br /><i class="glyphicon glyphicon-check" style=" color: #ff9900"></i> Delivering a high
                        quality curriculum
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="12" align="center"><i class="glyphicon glyphicon-heart"
                        style="color:#3f704d; font-size: 50px;"></i></td>
            </tr>
            <tr>
                <td colspan="6" style="border-right: 2px solid green" align=""
                    style="margin-left:20px; margin-right:20px;">
                    <p style="margin-left:20px; margin-right:20px;"><i>We have a clear understanding of our values at
                            Veronican Private Pre-Primary School:</i>
                        <br /><i style=" color: #ff9900">HAPPINESS AND WELL-BEING</i> - showing kindness
                        <br /><i style=" color: #ff9900">ENGAGEMENT</i> - being involved, resposnive, interested and
                        interesting
                        <br /><i style=" color: #ff9900">RESPECT</i> - promoting a culture of tolerance, inclusion,
                        diversity, equality, fairness and oppurtunity
                        <br /><i style=" color: #ff9900">COMMUNICATION</i> - being genuine, open, honest and sincere
                        <br /><i style=" color: #ff9900">ACHIEVEMENT</i> - highest quality, high expectations, aiming
                        high
                        <br /><i style=" color: #ff9900">INTEGRITY</i> - means doing the right thing, even when no one
                        else is watching
                        <br /><i style=" color: #ff9900">PARTNERSHIP AND CARE</i> - being reflective and learning from
                        parents as partners, developing strong nurturing relationships
                        <br /><i style=" color: #ff9900">CHALLENGING</i> - testing purselves and those around us, not
                        accepting the status quo
                        <br /><i style=" color: #ff9900">COMMITMENT TO EXCELLENCE</i> - developing skills for learning,
                        life and work.
                    </p>
                </td>
                <td colspan="6" align="center">
                    <h2 style=" color: #ff9900;">Core Values</h2>
                </td>
            </tr>
        </table>
    </div>

    <div class="modal fade" id="announcementModal">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #3f704d;">
                <div class="modal-header">
                    <h2 class="modal-title text-warning">ANNOUNCEMENTS</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if(isset($announcements[0]))
                    @foreach ($announcements->take(3) as $announcement)
                    <div class="card text-center card-home" style="padding: 0;">
                        <div class="card-header" style="padding: 10px;">
                            <h3 class="card-text text-success">{{ $announcement -> announcement_title }}</h3>
                        </div>
                        <div class="card-body" style="padding: 20px 30px;">
                            <p class="card-text text-info">{{ $announcement -> announcement_message}}</p>
                        </div>
                        <div class="card-footer text-muted" style="padding: 10px;">
                            <p style="font-size: 1.3rem;">
                                {{ date("l, jS \of F Y, h:i:s A", strtotime($announcement -> updated_at)) }}</p>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p style="text-align: center; color:white;">No Announcements posted!</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">

        <div id="fb-root"></div>

        <div class="fb-customerchat" attribution="page_inbox" page_id="103971228472620">
        </div>

        <p>Facebook Page: Saint Veronica Learning Center</p>
        <p>Phone Number: +639178780506</p>
        <p>Location: Jarabe Bldg., Bantug St., Tagnipa Maasin City, Southern Leyte</p>

    </footer>

    <script src="/js/landing-page.js"></script>

</body>

</html>