<?php
session_start();

	if(isset($_SESSION['username'])){
      
	    if (isset($_POST['query'])){

			$user = 'root';
			$pass = '';
			$db = 'biz_tripper';

			$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
			$errorMsg = "";

			$q = strip_tags($_POST["query"]);
			$sql = $q;	
			$result = $db->query($sql);

			$db->close();
  		} 
  		else{
    		$errorMsg = "You are not logged in yet.";
  		}
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BIZ-Tripper </title>
<link rel="stylesheet" type="text/css" href="../main.css">
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
</head>

<body>
<div id = "header">
  <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
  <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
  <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
   <input type="submit" align = "right" onClick="document.location.href = ('superuser.php');" value="back" name="back" id="logout" >
  <br>
</div>
<br><br>
<table align="center" id = "panel" width="80%">
	<tr>	
		<th> <input type="submit" onClick="document.location.href = ('new_user.php');" value="New User" name="newU" id="userButton"> </th>
		<th> <input type="submit" onClick="document.location.href = ('search_user.php');" value="Search User" name="searchU" id="userButton" ></th>
		<!-- <th> <input type="submit" onClick="document.location.href = ('update_user.php');" value="Update User" name="updateU" id="userButton" ></th>
		<th> <input type="submit" onClick="document.location.href = ('delete_user.php');" value="Delete User" name="deleteU" id="userButton" ></th> -->
	</tr>
</table>

<br /><br /><br />
<div id = "sqlquery">
<form action="" method="post">
<table align = "center">
<tr>	
	<th><p><h3><center>Write your single line SQL query to quick access the database.<br> Submit with Enter Key</center></h3></p></th>
</tr>
<tr>
	<th><input style="height:30px;width: 900px;font-size:14pt;" id = "box" name="query" type="text"></th>
</tr>
<tr>
	<th><br/><br/><?php
		global $errorMsg, $result;
		if ($errorMsg !=""){
			echo $errorMsg;
		}
		else{
			if ($result==""){
				echo "0 result";
			}
			else{
				if ($result->num_rows > 0) {
   			
  	  				while($row = $result->fetch_assoc()) {
  	  					print_r($row);
  	  					echo "<br>";
        				// echo "id: " . $row[""]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    				}
				} else {
    				echo "0 results";
				}
			}
		}
	?></th>
</tr>

</table> 
</form>
</div>

</body>
</html>