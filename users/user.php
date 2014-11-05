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
</head>

<body>
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
</table>
</body>
</html>