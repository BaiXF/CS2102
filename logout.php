<?php
session_start();
session_destroy();

if(isset($_SESSION['username'])){
	$msg = "<h32><center>You are now logged out</center></h2>";
}
else{
	$msg = "<h2><center>Please Login Again!</center></h2>";
}
?>
<html>
<head>
	<meta charset = "utf-8">
	<title> BIZ-Tripper</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href=" main.css">
	<style type="text/css">
  body {
    background-image:url(images/skyfly.jpg);
    background-repeat:no-repeat;
    background-size:cover;
  }
  </style>
</head>

<body>
	<div id = "header">
		&nbsp; &nbsp;
		<font size="25" color="white"><b>BIZ-Tripper Online Booking System</b></font> 
	<br>
</div>
<br><?php echo "$msg" ?><br><br>

<p><center><h3><a href="index.php">Click here</a> to return to our home page. </h3></center></p>
</body> 
</html>