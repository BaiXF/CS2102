<?php
// session_start();

	// if(isset($_SESSION['username'])){

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
	// }
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
                <li class="active"><a href="http://getbootstrap.com/examples/carousel/#">Home</a></li>


                <li class="dropdown">
                  <a href="http://getbootstrap.com/examples/carousel/#" class="dropdown-toggle" data-toggle="dropdown">Manage Users <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="new_user.php">New user</a></li>
                    <li><a href="search_user.php">Search user</a></li>
                    <li><a href="update_user.php">Update user</a></li>
                    <li><a href="delete_user.php">Delete user</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="http://getbootstrap.com/examples/carousel/#" class="dropdown-toggle" data-toggle="dropdown">Manage Airlines <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="http://getbootstrap.com/examples/carousel/#">Action</a></li>
                    <li><a href="http://getbootstrap.com/examples/carousel/#">Another action</a></li>
                    <li><a href="http://getbootstrap.com/examples/carousel/#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="http://getbootstrap.com/examples/carousel/#">Separated link</a></li>
                    <li><a href="http://getbootstrap.com/examples/carousel/#">One more separated link</a></li>
                  </ul>
                </li>
                <li class="nav navbar-nav navbar-right">
                    <a href="http://getbootstrap.com/examples/carousel/#">Logout</a>
                </li>
              </ul>

            </div>

          </div>
        </nav>

      </div>
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
					?></th>
				</tr>

			</table> 
		</form>
	</div>
	<script src="./Carousel Template for Bootstrap_files/jquery.min.js"></script>
	<script src="./Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
	<script src="./Carousel Template for Bootstrap_files/docs.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="./Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
</body>
</html>