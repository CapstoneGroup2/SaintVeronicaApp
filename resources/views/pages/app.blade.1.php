<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
  <div class="header">  
      
    <div class="header-right">
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Sign Up</a>
    </div>
  </div>

  <!-- Image Carousel -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="item active">
      <img src="{{ URL::to('/css/images/nursery.jpg') }}">
      <div class= "carousel-caption">
        <q>Education is the most powerful weapon which you can use to change the world.</q>
        <p class= "author"> -Nelson Mandela</p>
      </div>
    </div>

    <div class="item">
        <img src="{{ URL::to('/css/images/kids.jpg') }}">
      <div class= "carousel-caption">
        <q>When you educate one person you can change a life, when you educate many you can change the world.</q>
        <p class= "author">- Shai Reshif</p>
      </div>
    </div>

    <div class="item">
      <img src="{{ URL::to('/css/images/pupils.jpg') }}">
      <div class="carousel-caption">
        <q>The beautiful thing about learning is that no one can take it away from you.</q>
        <p class="author">- B.B. King</p>
      </div>
    </div>
  </div>


  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <div class="page-header">
        <div class="row row-no-gutter">
          <div class="col-sm-12 col-md-6">
            <ul class="list">
              <h2>Mission</h2>      
              <li  id="mission">Our mission is to...</li>
            </ul>
          </div>
    
          <div class="col-sm-12 col-md-6">
            <ul class="list" >
              <h2>Vision</h2>
                <li id="vision">We envision...</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row  row-no-gutters">
        <div class="col-sm-12 col-md-6">
          <ul class="list">
            <h6>Visit Us</h6>
              <p class="text-justify">Bantug St., Tagnipa, Maasin City, Southern Leyte
            <h6>Contact Us</h6>
              <li>
                <i class= "fa fa-phone"></i>
                (053)570-2182
              </li>
              <li>
                <i class= "fa fa-phone"></i>
                0917-314-8374
              </li>
          </ul>
        </div>



        <div class="col-xs-6 col-md-6">
          <ul class="list">
            <h6>Message Us</h6>
              <li>
                <i class="fa fa-envelope"></i>
                stveronicalearningcenter@gmail.com
              </li>
              <li>
                <i class="fab fa-facebook-square"></i>
                www.facebook.com/St-Veronica-Learning-Center
              </li>
          </ul>
        </div>
      </div>
        <hr>
      <div class="container">
        <div class="row row-no-gutters">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
         <a href="#">St.Veronica Learning Center</a>.
            </p>
          </div>
        </div>
      </div>
  </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
