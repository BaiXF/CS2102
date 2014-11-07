<?php
include "../include/common.inc.php";
session_start();

if(isset($_SESSION['username'])){

  $usname = $_SESSION['username'];
  $error_msg = "";

  $user = 'root';
  $pass = '';
  $db = 'biz_tripper';
  $result = '';

  $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
     
  $sql = "SELECT * from book_flight WHERE id='{$usname}' ORDER BY dept_time ASC";

  $result = $db->query($sql);
      

  $db->close();
  
} 
else{
  $msg = "You are not logged in yet.";
  echo $msg;
  header('Location: ../logout.php');
}
?>

<?php  
  global $result;
  $user = 'root';
  $pass = '';
  $db = 'biz_tripper';
  $result1 = '';

  $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
     

  $index = 1;
  echo "<br><br><br><br><br><br>";
  echo "<table>";
  echo "<tr>";

  if ($result->num_rows > 0){
        //echo "<h1> something here!</h1>";   
        echo "<td>Index&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "<td>Employee ID&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</td>";
        echo "<td>Passport No. &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </td>";
        echo "<td>Flight No.&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  </td>";
        echo "<td>Origin.&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </td>";
        echo "<td>Destination No.&nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;&nbsp;</td>";
        echo "<td>Departure Time&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>";
        echo "<td>Arrival Time&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  </td>";
        echo "</tr>";   
  while( ($row =$result->fetch_assoc()))
    {   
          // echo "<h1> something here!</h1>";
      // echo $row['flight_no'];
      // echo $row['dept_time'];
    $sql1 = "SELECT origin, destination, arri_time FROM flights WHERE flight_no = '{$row['flight_no']}' AND dept_time = '{$row['dept_time']}' ";
      // echo "<br>".$sql1;
		$result1 = $db->query($sql1);
		if ($result1->num_rows > 0){
          // echo "<h1> something here!</h1>";
			$row1 =$result1->fetch_assoc();	
        	$row['index'] = $index;
        	echo "<tr>";
        	echo "<td>".$row['index']."</td>";
        	$index = $index + 1;
        	echo "<td>".$row['id']."</td>";
        	echo "<td>".$row['passportNo']."</td>";
        	echo "<td>".$row['flight_no']."</td>";
        	echo "<td>".$row1['origin']."</td>";
        	echo "<td>".$row1['destination']."</td>";
        	echo "<td>".$row['dept_time']."</td>";
        	echo "<td>".$row1['arri_time']."</td>";
    	}

    }

    }
    else{
        echo "<tr>";
        echo "<td>nothing selected!</td>";
    }
    echo "</tr>";
    echo "</table>";
?>

<!doctype html>
<html>
    <head>
      <meta charset="utf-8">
      <title>BIZ-Tripper </title>
    <!-- <script type= "text/javascript" src = "../js/countries2.js"></script> 
      <link rel="stylesheet" type="text/css" href="../main.css">-->
      <link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="signin.css" rel="stylesheet">
      <script src="./Carousel Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
      <link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
      <script type= "text/javascript" src = "../js/countries2.js"></script>
      <script type= "text/javascript" src = "../js/countries1.js"></script>
      <script src="../Carousel Template for Bootstrap_files/jquery.min.js"></script>
      <script src="../Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
      <script src="../Carousel Template for Bootstrap_files/docs.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="../bootstrap/js/*.js"></script>
        <style type="text/css">
      body {
        /*background-image:url(../images/skyfly.jpg);*/
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
       <input type="submit" align = "right" onClick="document.location.href = ('user.php');" value="back" name="back" id="logout" >
      <br>
    </div>
    -->
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
                <li><a href="user.php">Home</a></li>

                <li><a href="./profile.php">Profile</a></li>
                <li><a href="./search_flights.php">Search for Flight</a></li>
                <li class="active"><a href="./my_bookings.php">My Bookings</a></li>
                <li class="nav navbar-nav navbar-right">
                  <a href="../index.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div>
      <br><br><br><br><br><br>
    </div>
  </body>
  </style>
  </html>