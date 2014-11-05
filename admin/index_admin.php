<?php

session_start();


$profpic = "../images/index_wp.jpg";

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
		header("Location: manage_users.php");
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
	<style type="text/css">
		body {
			background-image:url('<?php echo $profpic;?>');
			background-repeat:no-repeat;
    		background-position:50% 20%;
		}
	</style>
	<!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body>
	<script src="js/bootstrap.min.js"></script>
	<div id = "header">
		&nbsp; &nbsp;
		<font size="25" color="white"><b>BIZ-Tripper Online Booking System</b></font> 
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
<div class="container">
<form action="" method="post" enctype="multipart/form-data" class="form-signin" role="form">

<table align="center">
  <tr>
    <th class="form-signin-heading"><font color="white">Login</font></th>
    </tr>
  <tr>
    <td><input name="username" type="text" class="form-control" placeholder="Admin ID" required autofocus/></td>
  </tr>
  <tr>
    <td><input name="password" type="password" class="form-control" placeholder="Password" required/></td>
  </tr>
    <tr>
    <td><br></td>
  </tr>
  <tr>
    <td>
    <button class="btn btn-lg btn-primary btn-block" type="submit" value = "Submit" name="submit">Sign in</button>
   </td>
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