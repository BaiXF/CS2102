<?php

session_start();

$user = 'root';
$pass = '';
$db = 'biz_tripper';

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
$error_msg = "";

if (isset($_POST)){
  if(isset($_POST["flight_no"]) && isset($_POST["departure"]) && isset($_POST["arrival"]) && isset($_POST["origin"]) && 
    isset($_POST["destination"]) && isset($_POST["capacity"])){

    $flightNo     =  strip_tags($_POST["flight_no"]);
    $departure   =  strip_tags($_POST["departure"]);
    $arrival     =  strip_tags($_POST["arrival"]);
    $origin    =  strip_tags($_POST["origin"]);
    $destination     =  strip_tags($_POST["destination"]);
    $capacity       =  strip_tags($_POST["capacity"]);
    
    $sql1 = "INSERT INTO flights (flight_no, dept_time, arri_time, origin, destination, capacity, occupied) VALUES ('{$flightNo}', '{$departure}', '{$arrival}', '{$origin}', '{$destination}', '{$capacity}', 0)"; 
    
    $result1 = $db->query($sql1);
      
    if ($sql1){  
      $error_msg = "One Row Inserted!";
    }
  }
}
else{
  echo "nothing input";
} 
$db->close();

?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>BIZ-Tripper </title>
  <script type= "text/javascript" src = "../js/countries2.js"></script>
  <link rel="stylesheet" type="text/css" href="../main.css">
  <link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
  <link href="signin.css" rel="stylesheet">
  <style type="text/css">
  body {
    background-image:url(../images/plane.jpg);
    background-repeat:no-repeat;
    background-size:cover;
  }
  </style>
</head>

<body>
<!--
<div id = "header">
  <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
  <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
  <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
   <input type="submit" align = "right" onClick="document.location.href = ('manage_users.php');" value="back" name="back" id="logout" >
  <br>
</div>
-->
<script src="js/bootstrap.min.js"></script>
<script src="../Carousel Template for Bootstrap_files/jquery.min.js"></script>
<script src="../Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
<script src="../Carousel Template for Bootstrap_files/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
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
            <li class="active"><a href="manage_users.php">Home</a></li>


            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Users <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="./new_user.php">New user</a></li>
                <li><a href="./search_user.php">Search user</a></li>
                <!-- <li><a href="/update_user">Update user</a></li>
                <li><a href="/delete_user">Delete user</a></li> -->
              </ul>
            </li>

            <li class="dropdown">
              <a href="manage_users.php" class="dropdown-toggle" data-toggle="dropdown">Manage Airlines <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="./new_flight.php">New flight</a></li>
                <li><a href="./manage_flights.php">Manage Bookings</a></li>
                
              </ul>
            </li>
            <li class="nav navbar-nav navbar-right">
              <a href="../logout.php">Logout</a>
            </li>
          </ul>

        </div>

      </div>
    </nav>

  </div>
</div>
<div id="wrapper">
  <div class="error"><?php 
  echo $error_msg; 
    // $_POST = array();
  ?></div>
</div>
<div>
<br><br><br><br><br><br>
</div>
<div align = "center">
  <form role="form" action="" method="post">
    <table align="center">
      <tr>
        <th scope="row"><font color="white">Flight No. *: </font></th>
        <td><input name="flight_no" type="text" class="form-control" required="" autofocus/></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
       <tr>
        <th scope="row"><font color="white">Origin *: </font></th>
        <td><input type="text" name="origin" class="form-control" required="" autofocus/></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <th scope="row"><font color="white">Destination *: </font></th>
        <td><input name="destination" type="text" class="form-control" required="" autofocus/></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <th scope="row"><font color="white">Departure Time *: </font></th>
        <td><input name="departure" type="datetime-local"  class="form-control" required="" autofocus/></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <th scope="row"><font color="white">Arrival Time *: </font></th>
        <td><input type="datetime-local" name="arrival" class="form-control" required="" autofocus/></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <th scope="row"><font color="white">Capicity *: </font></th>
        <td><input name="capacity" type="integer" class="form-control" required="" autofocus/></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <td>
          <button class="btn btn-lg btn-primary btn-block" type="submit" value = "Submit" name="submit">Submit</button>
        </td>
      </tr>
      <tr>
        <th scope = "row" align = "right" ><p><font color="white"> *: Compulsive Area. </font></p></th>
      </tr>
    </table>
  </form>
</div>
</body>
</html>