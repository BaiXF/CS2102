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

}
else{
	$errorMsg = "You are not logged in yet.";
}


?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>BIZ-Tripper </title>
	<link rel="stylesheet" type="text/css" href="../main.css">
	<link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<script src="./Carousel Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
	<link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
</head>

<body>

<!-- <div id = "sqlquery">
<form action="" method="post">
<table align = "center">
<tr>	
	<th><p><h3><center>Write your single line SQL query to quick access the database.<br> Submit with Enter Key</center></h3></p></th>
</tr>
<tr>
	<th><input style="height:30px;width: 900px;font-size:14pt;" id = "box" name="query" type="text"></th>
</tr>
<tr>
	<th><br/><br/> -->

	<!--<div id = "header">
		<img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
		<font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
		<input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
		<br>
	</div>
	<br><br>
	<table align="center" id = "panel" width="80%">
		<tr>	
			<th> <input type="submit" onClick="document.location.href = ('new_user.php');" value="New User" name="newU" id="userButton"> </th>
			<th> <input type="submit" onClick="document.location.href = ('search_user.php');" value="Search User" name="searchU" id="userButton" ></th>
			<th> <input type="submit" onClick="document.location.href = ('update_user.php');" value="Update User" name="updateU" id="userButton" ></th>
			<th> <input type="submit" onClick="document.location.href = ('delete_user.php');" value="Delete User" name="deleteU" id="userButton" ></th>
		</tr>
	</table>

	<br /><br /><br />
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
						<li class="active"><a href="manage_users.php">Home</a></li>


						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Users <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="./new_user.php">New user</a></li>
								<li><a href="./search_user.php">Search user</a></li>
								<!-- <li><a href="/update_user">Update user</a></li>
								<li><a href="/delete_user">Delete user</a></li> -->
							</ul>
						</li>

						<li class="dropdown">
							<a href="manage_users.php" class="dropdown-toggle" data-toggle="dropdown">Manage Airlines <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="./new_flight.php">New flight</a></li>
								<li><a href="./manage_flights.php">Search flight</a></li>
							</ul>
						</li>
						<li class="nav navbar-nav navbar-right">
							<a href="../index.php">Logout</a>
						</li>
					</ul>

				</div>

			</div>
		</nav>

	</div>
</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class=""></li>
		<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item">
			<img src="../pic/BusinessStrategyChess.jpg" alt="First slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Welcome to Biz Tripper Admin Portal</h1>
					<p>
						The most efficient business trip management exclusively designed for your company. The first service provider for professional business booking. 
					</p>
				</div>
			</div>
		</div>
		<div class="item active">
			<img src="../pic/plane.jpg" alt="Second slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Manage flights have never been easier</h1>
					<p>
						Built in database of flight information. Identify the right flight the fastest and the safest. Simple interface for you to manage flight information. 
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="../pic/biztrip.jpg" alt="Third slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Give your employees the superior business trip experience</h1>
					<p>
						Manage every employee details and book exactly the flight they want for the next business trip.
					</p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>


    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="../pic/business-man.png" style="width: 140px; height: 140px;">
          <h2>Meet Dexter</h2>
          <p>Biz tripper is one of the best flight booking system I have ever used. It is so convenient that I can even book my flight the last minute.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="../pic/black.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Meet Michael</h2>
          <p>I am impressed with the simple design of Biz Tripper. In the past we used to hire a secretary to book flight for our emloyees, now it is all handled by Biz Tripper.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="../pic/woman.jpg" style="width: 140px; height: 140px;">
          <h2>Meet Sharon</h2>
          <p>Biz Tripper keeps you from the excess information and only offers you what is the most crucial. </p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- FOOTER -->
      <footer>
        <p>© 2014 BizTripper, Inc.</p>
        <!--<p>Created by Bai Xuefeng, Liu Chuning and Sun Jingwen :)</p>-->
      </footer>

    </div>


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
				<th>
					<br/>
					<br/>

					<?php
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
					?>
					</th>
				</tr>

			</table> 
		</form>
	</div>
	<script src="../Carousel Template for Bootstrap_files/jquery.min.js"></script>
	<script src="../Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
	<script src="../Carousel Template for Bootstrap_files/docs.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
</body>
</html>