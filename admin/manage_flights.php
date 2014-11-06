<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: ../logout.php');
}
$user = 'root';
$pass = '';
$db = 'biz_tripper';
$result = '';

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
$error_msg = "";


$sql = "SELECT * from book_flight ORDER BY dept_time ASC";

$result = $db->query($sql);


$db->close();

?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>BIZ-Tripper </title>
  <link rel="stylesheet" type="text/css" href="../main.css">
  <link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
  <script type= "text/javascript" src = "../js/countries2.js"></script>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
  <link href="signin.css" rel="stylesheet">
  <style type="text/css">
  body {
    background-image:url(../images/above_clouds.jpg);
    background-repeat:no-repeat;
    background-size:cover;
  }
  </style>
</head>

<body>
  <script src="js/bootstrap.min.js"></script>
  <script src="../Carousel Template for Bootstrap_files/jquery.min.js"></script>
  <script src="../Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
  <script src="../Carousel Template for Bootstrap_files/docs.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
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
                <li><a href="./manage_flights.php">Manage Bookings</a></li>
              </ul>
            </li>
            <li class="nav navbar-nav navbar-right">
              <a href="../logout.php">Logout</a>
            </li>
          </ul>

        </div>

      </div>
    </nav>

  </div>
</div>

<div id = 'results'>
  <?php  
  global $result;
  $index = 1;
  echo "<table>";
  echo "<tr>";

  if ($result->num_rows > 0){
        // echo "something selected";        
    echo "<td>Index&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "<td>Employee ID&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "<td>Passport No. &nbsp; &nbsp;&nbsp; &nbsp; </td>";
    echo "<td>Flight No.&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>Departure Time&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "</tr>";   
    while( ($row =$result->fetch_assoc()))
    {   
      $row['index'] = $index;
      echo "<tr>";
      echo "<td>".$row['index']."</td>";
      $index = $index + 1;
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['passportNo']."</td>";
      echo "<td>".$row['flight_no']."</td>";
      echo "<td>".$row['dept_time']."</td>";

    }

  }
  else{
    echo "<tr>";
    echo "<td>nothing selected!</td>";
  }
  echo "</tr>";
  echo "</table>";
  ?>

</div>
<?php 
$user = 'root';
$pass = '';
$db = 'biz_tripper';
$result = '';
global $row;

echo $row['index'];

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
$sql1 = "DELETE FROM book_flight WHERE 1 ";
$sql2 = "UPDATE flights SET occupied = occupied-1 WHERE 1 ";
$empty_flag = 1;

if(isset($_POST["delete_button"])){
  

  if (isset($_POST["employeeID"]) && $_POST["employeeID"]!=''){
    $id = strip_tags($_POST["employeeID"]);
    $sql1 =  $sql1."AND id = '{$id}' ";
  }

  if (isset($_POST["flightNo"]) && $_POST["flightNo"]!=''){
    $fn = strip_tags($_POST["flightNo"]);
    $sql1 = $sql1."AND flight_no = '{$fn}' ";
    $sql2 = $sql2."AND flight_no = '{$fn}' ";
    $empty_flag = 0;
  }

  if (isset($_POST["date"]) && $_POST["date"]!=''){
    $dt = strip_tags($_POST["date"]);
    $sql1 = $sql1."AND date(dept_time) = '{$dt}' ";
    $sql2 = $sql2."AND date(dept_time) = '{$dt}' ";
    $empty_flag = 0;
  }
  
  echo $sql1;
  echo $sql2;
  if($empty_flag){
    echo "<br><h2>Please input at least one field from flight number and date.</h2>";
  }
  else{
    $result1 = $db->query($sql1);
    $result2 = $db->query($sql2);
    if ($sql1){
      header("Refresh:0");
    }
    else{
      echo "<h2>Cannot be deleted!</h2>";
    }
  }
}

?>
<div>
  <br><br><br><br>
</div>
<div align = "center">
  <form action="" method="post" role="form">
    <table align="center">
      <tr>
        <th scope="row"><font color="white">Empolyee ID: </font></th>
        <td><input name="employeeID" type="text" class="form-control" required="" autofocus/></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <th scope="row"><font color="white">Flight No.: </font></th>
        <td><input name="flightNo" type="text" class="form-control" required="" autofocus/></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <th scope="row"><font color="white">Date: </font></th>
        <td><input name="date" type="date" class="form-control" required="" autofocus/></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <td>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="delete_button" value="Delete">Submit</button>
        </td>
      </tr>

    </table>
  </form>
</div>
</body>
</html>