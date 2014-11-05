<?php
include "../include/common.inc.php";
session_start();

if(isset($_SESSION['username'])){

  $usname = $_SESSION['username'];
  $result = "Test variables: <br /> Username: ".$usname;
} 
else{
  $result = "You are not logged in yet.";
  echo $result;
  header('Location: ../logout.php');
}

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>BIZ-Tripper</title>
  <link rel="stylesheet" type="text/css" href="../main.css">
  <link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="./Carousel Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
  <link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
</head>

<body>
  <!--
<div id = "header">
  <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
  <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
  <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
  <br>
</div>


<div>
<br/><br/>
<table align="center" id = "panel" width="80%">
  <tr>  
    <th> <input type="submit" onClick="document.location.href = ('profile.php');" value="My Profile" name="profile" id= "myProfile" > </th>
    <th> <input type="submit" onClick="document.location.href = ('search_flights.php');" value="Search Flights" name="search" id="searchFlight" ></th>
  </tr>
  <tr>
  <th> <br/><br/><img src = "../images/profile.jpg" id = "usersIMG" height = 300 width=600 ></th>

  <th> <br/><br/><img src = "../images/flights.jpg" id = "flightsIMG" height = 300 width = 600></th>
  </tr>

</div>
</table>-->

<div class="navbar-wrapper">
  <div class="container">
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">BizTripper</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="user.php">Home</a></li>

            <li><a href="./profile.php">Profile</a></li>
            <li><a href="./search_flights.php">Search for Flight</a></li>
            <li><a href="./my_bookings.php">My Bookings</a></li>
            <li class="nav navbar-nav navbar-right">
              <a href="../index.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>



<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class=""></li>
    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item">
      <img src="../pic/BusinessStrategyChess.jpg" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Welcome to Biz Tripper User Portal</h1>
          <p>
            The most efficient business trip management exclusively designed for you. The first service provider for professional business flight booking.
            BizTripper, take off with your career.
          </p>
        </div>
      </div>
    </div>
    <div class="item active">
      <img src="../pic/plane.jpg" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Book flights have never been easier</h1>
          <p>
            Built in database of flight information. Identify the right flight the fastest and the safest. Simple interface for you to manage flight information. 
          </p>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="../pic/biztrip.jpg" alt="Third slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Give you the superior business trip experience</h1>
          <p>
            Manage every flight details and book exactly the flight you want for the next business trip.
          </p>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-lg-4">
      <img class="img-circle" src="../pic/business-man.png" style="width: 140px; height: 140px;">
      <h2>Meet Dexter</h2>
      <p>Biz tripper is one of the best flight booking system I have ever used. It is so convenient that I can even book my flight the last minute.</p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="img-circle" src="../pic/black.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
      <h2>Meet Michael</h2>
      <p>I am impressed with the simple design of Biz Tripper. In the past we used to hire a secretary to book flight for our emloyees, now it is all handled by Biz Tripper.</p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="img-circle" src="../pic/woman.jpg" style="width: 140px; height: 140px;">
      <h2>Meet Sharon</h2>
      <p>Biz Tripper keeps you from the excess information and only offers you what is the most crucial. </p>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->

  <!-- FOOTER -->
  <footer>
    <p>© 2014 BizTripper, Inc.</p>
    <!--<p>Created by Bai Xuefeng, Liu Chuning and Sun Jingwen :)</p>-->
  </footer>

</div>
<script src="../Carousel Template for Bootstrap_files/jquery.min.js"></script>
<script src="../Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
<script src="../Carousel Template for Bootstrap_files/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>

</body>
</html>