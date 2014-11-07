<?php
include "../include/common.inc.php";
session_start();

$user = 'root';
$pass = '';
$db = 'biz_tripper';
if(isset($_SESSION['username'])){
  
  $usname = $_SESSION['username'];
      // echo "$usname:";
	  // echo $usname;
  $result = "Test variables: <br /> Username: ".$usname;

  $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
  $error_msg = "";

  $sql = "SELECT * FROM profile WHERE employeeID = '{$usname}' ";
  $result = $db->query($sql);
  
} 
else{
  echo "You are not logged in yet.";
  header('Location: ../logout.php');
}

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Biz-tripper</title>
  <link rel="stylesheet" type="text/css" href="../main.css">
  <link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="./Carousel Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
  <link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
  <style type="text/css">
  body {
    background-image:url(../images/blue.jpg);
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

            <li class="active"><a href="./profile.php">Profile</a></li>
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

<div id = 'myprofile' align='center'>
  <?php  
  global $result;
  echo "<form action='' method='post' style='color:white'>";
  echo "<table width='50%'>";
  echo "<tr>";

  if ($result->num_rows == 1){
        // echo "something selected";        
  	$row =$result->fetch_assoc();

    echo "<br><br><br><br><br><br>";
    echo "<td>Employee ID:&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "<td>".$row['employeeID']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "</tr>";

    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";

    echo "<tr>";
    echo "<td>Position:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>".$row['position']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "</tr>";

    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";

    echo "<tr>";
    echo "<td>Firstname:&nbsp; &nbsp;&nbsp; &nbsp; </td>";
    echo "<td>".$row['firstName']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "</tr>";

    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";

    echo "<tr>";
    echo "<td>Lastname:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>".$row['lastName']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "</tr>";

    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";

    echo "<tr>";
    echo "<td>Passport No.:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>".$row['passportNo']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "</tr>";

    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";

    echo "<tr>";
    echo "<td>Nationality:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>".$row['nationality']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "</tr>";

    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";

    echo "<tr>";
    echo "<td>Gender:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>".$row['sex']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "</tr>";
    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";
    
    echo "<tr>";
    echo "<td>DoB:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>".$row['dob']."&nbsp; &nbsp;&nbsp; &nbsp; </td>";
    echo "<td>Update DoB: &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td><font color='black'><input type='date' name='birthday'></td>";
    echo "</tr>";   
    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";

    echo "<tr>";
    echo "<td>email&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>".$row['email']."&nbsp; &nbsp;&nbsp; &nbsp; </td>";
    echo "<td>Update Email: &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td><font color='black'><input type='email' name='email'></td>";
    echo "</tr>";   
    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";

    echo "<tr>";
    echo "<td>contactNo&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>".$row['contactNo']."&nbsp; &nbsp;&nbsp; &nbsp; </td>";   
    echo "<td>Update Contact: &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td><font color='black'><input type='integer' name='contactNo'></td>";
    echo "</tr>";   
    echo"<tr>";
    echo"<td><br></td>";
    echo"</tr>";
    
    echo "<tr>";
    echo "<td>address&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>".$row['address']."&nbsp; &nbsp;&nbsp; &nbsp; </td>";
    echo "<td>Update Address: &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td><font color='black'><input type='text' name='address'></td>";
    echo "</tr>";   
    
    echo "<tr>";
    echo "<td></td><td></td><td height='80'><font color='black'><input type='submit' name='update_button' value='Update' /></td>";

  }
  else{
    echo "<tr>";
    echo "<td>nothing selected!</td>";
  }
  echo "</tr>";
  echo "</table>";
  echo "</form>"
  ?>
  <?php  
  $user = 'root';
  $pass = '';
  $db = 'biz_tripper';
  if(isset($_SESSION['username'])){
    
    $usname = $_SESSION['username'];
    $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
    $error_msg = "";

    if(isset($_POST['birthday']) && strip_tags($_POST["birthday"])!= ''){
     echo "<h1>b-day updated!</h1>";
     $dob = strip_tags($_POST["birthday"]);
     $sql1 = "UPDATE profile SET dob = '{$dob}' WHERE employeeID = '{$usname}' ";         
     $result1 = $db->query($sql1);
   }
   if(isset($_POST['email']) && strip_tags($_POST["email"])!= ''){
     echo "<h1>email updated!</h1>";
     $email = strip_tags($_POST["email"]);
     $sql2 = "UPDATE profile SET email = '{$email}' WHERE employeeID = '{$usname}' ";         
     $result2 = $db->query($sql2);
   }
   if(isset($_POST['contactNo']) && strip_tags($_POST["contactNo"])!= ''){
     echo "<h1>contact updated!</h1>";
     $contact = strip_tags($_POST["contactNo"]);
     $sql3 = "UPDATE profile SET contactNo = '{$contact}' WHERE employeeID = '{$usname}' ";         
     $result3 = $db->query($sql3);
   }
   if(isset($_POST['address']) && strip_tags($_POST["address"])!= ''){
     echo "<h1>email updated!</h1>";
     $address = strip_tags($_POST["address"]);
     $sql4 = "UPDATE profile SET address = '{$address}' WHERE employeeID = '{$usname}' ";         
     $result4 = $db->query($sql4);
   }
   if (isset($_POST['birthday']) || isset($_POST['email']) || isset($_POST['contactNo']) || isset($_POST['address'])){
     // sleep(2);
     // header("Refresh:0");	
   }
 }
 ?>
</div>

<script src="../Carousel Template for Bootstrap_files/jquery.min.js"></script>
<script src="../Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
<script src="../Carousel Template for Bootstrap_files/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
</body>
</html>


