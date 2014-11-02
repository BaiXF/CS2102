<?php
// session_start();

if (isset($_POST['username'])){

	$user = 'root';
	$pass = '';
	$db = 'biz_tripper';

	$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");

	$errorMsg = "";

	$usname = strip_tags($_POST["username"]);
	$paswd = strip_tags($_POST["password"]);
	

	$sql = "SELECT * FROM admin A WHERE '{$usname}' = A.adminID and '{$paswd}' = A.pwd";	
	$result = $db->query($sql);
	
	if ($result->num_rows >0){

		$_SESSION['username'] = $usname;
		header("Location: superuser.php");
	}
	else{
		$errorMsg = "<h2><center>Your Employee ID or your Password is incorrect. <br/> Please try again or contact the HR</center></h2>";
	}
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
	<br>
</div>
<div id="menu">
	<ul>
		<li><a href="../index.php" onMouseOver="this.style.color='#FFF';" onMouseOut="this.style.color='#CCC';">Login</a></li>
    	<li><a href="index_admin.php"  id="currLi">Admin Login</a></li>
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
    <th scope="row">Admin ID: </th>
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
<?php
	global $errorMsg;
	if ($errorMsg != ""){
		echo $errorMsg;
	}
?>
</body>
</html>