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
</head>

<body>
<div id = "header">
  <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
  <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
  <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
   <input type="submit" align = "right" onClick="document.location.href = ('user.php');" value="back" name="back" id="logout" >
  <br>
</div>
<div id = 'myprofile'>
<?php  
  global $result;
  echo "<form action='' method='post'>";
  echo "<table width='50%'>";
  echo "<tr>";

  if ($result->num_rows == 1){
        // echo "something selected";        
  	$row =$result->fetch_assoc();

        echo "<td>Employee ID:&nbsp; &nbsp;&nbsp; &nbsp;</td>";
		echo "<td>".$row['employeeID']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
		echo "</tr>";

		echo "<tr>";
        echo "<td>Position:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>".$row['position']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "</tr>";

		echo "<tr>";
        echo "<td>Firstname:&nbsp; &nbsp;&nbsp; &nbsp; </td>";
        echo "<td>".$row['firstName']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "</tr>";

		echo "<tr>";
        echo "<td>Lastname:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>".$row['lastName']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Passport No.:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>".$row['passportNo']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Nationality:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>".$row['nationality']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Gender:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>".$row['sex']."&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td>DoB:&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>".$row['dob']."&nbsp; &nbsp;&nbsp; &nbsp; </td>";
        echo "<td>Update DoB: &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td><input type='date' name='birthday'></td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>email&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>".$row['email']."&nbsp; &nbsp;&nbsp; &nbsp; </td>";
        echo "<td>Update Email: &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td><input type='email' name='email'></td>";
        echo "</tr>";   
   	
   		echo "<tr>";
        echo "<td>contactNo&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>".$row['contactNo']."&nbsp; &nbsp;&nbsp; &nbsp; </td>";
    	echo "<td>Update Contact: &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td><input type='integer' name='contactNo'></td>";
        echo "</tr>";   
   	    
   	    echo "<tr>";
        echo "<td>address&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>".$row['address']."&nbsp; &nbsp;&nbsp; &nbsp; </td>";
    	echo "<td>Update Address: &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td><input type='text' name='address'></td>";
        echo "</tr>";   
     	
     	echo "<tr>";
        echo "<td></td><td></td><td height='80'><input type='submit' name='update_button' value='Update' /></td>";

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
      	sleep(2);
      	header("Refresh:0");	
      }
}
?>
</div>
</body>
</html>


