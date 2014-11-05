
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
  }

?>
<!doctype html>
<html>
<head>
	<meta charset = "utf-8">
	<title> BIZ-Tripper</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href=" ../main.css">
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
		<th> <input type="submit" onClick="document.location.href = ('manage_users.php');" value="Manage Users" name="manageU" id="manageUser"> </th>

		<th> <input type="submit" onClick="document.location.href = ('manage_flights.php');" value="Manage Flights" name="manageF" id="manageFlight" ></th>
	</tr>
	<tr>
	<th> <br/><br/><img src = "../images/office.jpg" id = "usersIMG" height = 300 width=600 ></th>
	<th> <br/><br/><img src = "../images/flights.jpg" id = "flightsIMG" height = 300 width = 600></th>
	</tr>

</div>
</table>
</body>
</html>
