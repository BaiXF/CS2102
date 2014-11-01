<?php
session_start();

if ($_POST['username']){

	$dbUsname = "Peter";
	$dbPassword = "test1";
	$uid = "1111";
	$errorMsg = "";

	$usname = strip_tags($_POST["username"]);
	$paswd = strip_tags($_POST["password"]);

	if ($usname == $dbUsname && $paswd == $dbPassword){
		$_SESSION['username'] = $usname;
		$_SESSION['id'] = $uid;
		header("Location: user.php");
	}
	else{
		
		echo "<h2>Your Employee ID or your Password is incorrect. <br/> Please try again or contact the HR</h2>";
	}
}
?>

<!doctype html>
<html>
<head>
	<meta charset = "utf-8">
	<title> BIZ-Tripper</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href=" main.css">
</head>

<body>
	<div id = "header">
		<img src = "images/logo.jpg" height = 100> &nbsp; &nbsp;
		<font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
	<br>
</div>
<div id="menu">
	<ul>
		<li><a href="index.php" id="currLi">Login</a></li>
    	<li><a href="index_admin.php"  onMouseOver="this.style.color='#FFF';" onMouseOut="this.style.color='#CCC';">Admin Login</a></li>
        <!-- <li><a href="register.php" onMouseOver="this.style.color='#FFF';" onMouseOut="this.style.color='#CCC';">Register</a></li> -->
    </ul>
    <br>
</div>
<br>
<div id="main">
<form action="" method="post" enctype="multipart/form-data">


<table align="left" width="80%" border="1">
  <tr>
    <th colspan="2" scope="row">Login</th>
    </tr>
  <tr>
    <th scope="row">Employee ID: </th>
    <td><input name="username" type="text" /></td>
  </tr>
  <tr>
    <th scope="row">Password: </th>
    <td><input name="password" type="password" /></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><input type="submit" value = "Submit" name="submit" /></td>
  </tr>
</table>
</form>


</div>
</body>
</html>