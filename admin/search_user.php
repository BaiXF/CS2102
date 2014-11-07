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
if(isset($_POST["all"])){
  echo "search all pressed lol!!";
  $result = $db->query("SELECT * FROM profile");

}
else{

  if(isset($_POST["position"]))
    $position     =  strip_tags($_POST["position"]);
  else 
    $position='';
  if(isset($_POST["employeeID"]))
    $employeeID   =  strip_tags($_POST["employeeID"]);
  else 
    $employeeID='';
  if(isset($_POST["firstname"]))
    $firstname    =  strip_tags($_POST["firstname"]);
  else 
    $firstname = '';
  if(isset($_POST["lastname"]))
    $lastname     =  strip_tags($_POST["lastname"]);
  else 
    $lastname = '';
  if(isset($_POST["gender"]))
    $gender       =  strip_tags($_POST["gender"]);
  else
    $gender = '';
  if(isset($_POST["birthday"]))
    $birthday     =  strip_tags($_POST["birthday"]);
  else
    $birthday = '';
  if(isset($_POST["passportNo"]))
    $passportNo   =  strip_tags($_POST["passportNo"]);
  else
    $passportNo = '';
  if(isset($_POST["email"]))
    $email        =  strip_tags($_POST["email"]);
  else
    $email = '';
  if(isset($_POST["contactNo"]))
    $contactNo    =  strip_tags($_POST["contactNo"]);
  else 
    $contactNo = '';
  if(isset($_POST["address"]))
    $address      =  strip_tags($_POST["address"]);
  else 
    $address = '';

  $sql = "SELECT * FROM profile WHERE position like '%{$position}%' and employeeID like '%$employeeID%' and firstName like '%$firstname%' and lastName like '%$lastname%' and sex like '%$gender%' and passportNo like '%$passportNo%' and email like '%$email%' and address like '%$address%' and contactNo like '%$contactNo%'";  
  $result = $db->query($sql);

}


$db->close();

?>

<!doctype html>
<html>
<head>
<<<<<<< Updated upstream
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
    background-image:url(../images/keys.jpg);
    background-repeat:no-repeat;
    background-size:cover;
  }
  </style>
=======
<meta charset="utf-8">
<title>BIZ-Tripper </title>
<!-- <script type= "text/javascript" src = "../js/countries2.js"></script> -->
<link rel="stylesheet" type="text/css" href="../main.css">
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="./Carousel Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
<link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
>>>>>>> Stashed changes
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

<div>
  <br><br><br><br>
</div>

<div align="center">
  <h3><font color="white">Please input information in the fields below</font></h3>
    <div class="error"><?php 
    echo $error_msg; ?>
  </div>

  <div align="center">
    <form role="form" action="" method="post">
      <table align="center">
        <tr>
          <th scope="row"><font color="white">Position: </font></th>
          <td><input name="position" type="text" class="form-control" autofocus/></td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <th scope="row"><font color="white">Employee ID: </font></th>
          <td><input name="employeeID" type="text" class="form-control" autofocus></td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <th scope="row"><font color="white">First Name: </font></th>
          <td><input name="firstname" type="text" class="form-control" autofocus></td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <th scope="row"><font color="white">Last Name: </font></th>
          <td><input name="lastname" type="text" class="form-control" autofocus></td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <th scope="row"><font color="white">Passport No: </font></th>
          <td><input name="passportNo" type="text" class="form-control" autofocus></td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <th scope="row"><font color="white">Gender: </font></th>
          <td><select name="gender">
            <option value="M">M</option>
            <option value="F">F</option>
            &nbsp;</select></td>
          </tr>
 <!--    <tr>
    <th scope="row">Birthday: </th>
    <td><input type="date" name="birthday"></td>
  </tr> -->
  <tr>
    <td><br></td>
  </tr>
  <tr>
    <th scope="row"><font color="white">Email: </font></th>
    <td><input type="text" name="email" class="form-control" autofocus></td>
  </tr>
  <tr>
    <td><br></td>
  </tr>
  <tr>
    <th scope="row"><font color="white">Contact No: </font></th>
    <td><input type="text" name="contactNo" class="form-control" autofocus></td>
  </tr>
  <tr>
    <td><br></td>
  </tr>
  <tr>
    <th scope="row"><font color="white">Address: </font></th>
    <td><input type="text" name="address" class="form-control" autofocus></td>
  </tr>
  
 <!--  <tr>
    <th scope="row">Nationality: </th>
    <td><select onchange="print_state('state',this.value);" id="country" name = "country"></select></td>
    </tr>
    <script language="javascript">print_country("country");</script></td> -->
    <tr>
    <td><br></td>
  </tr>
    <tr>
      <td>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="submit">Submit</button>
      </td>
       <th scope="row"><font color="white" align ="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Or </font></th>
          <td>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="all" value="Search All">Search All</button>
          </td>
        </tr>
              </tr>
      <tr>
        <td><br></td>
      </tr>
  </table>
</form>
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
    echo "<td>employeeID&nbsp; &nbsp;&nbsp; &nbsp;</td>";
    echo "<td>firstName&nbsp; &nbsp;&nbsp; &nbsp; </td>";
    echo "<td>lastName&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>position&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>email&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "<td>contactNo&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
    echo "</tr>";   
    while( ($row =$result->fetch_assoc()))
    {   
      echo "</tr>";
      echo "<td>$index</td>";
      $index = $index + 1;
      echo "<td>".$row['employeeID']."</td>";
      echo "<td>".$row['firstName']."</td>";
      echo "<td>".$row['lastName']."</td>";
      echo "<td>".$row['position']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['contactNo']."</td>";
        // echo "<td><input type="submit" value = "update" name="update"></td>";
        // echo "<td><input type="submit" value = "delete" name="delete"></td>";
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

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");

if(isset($_POST["delete_button"])){
  if (isset($_POST["delete"])){
    $id = strip_tags($_POST["delete"]);
        // echo "<h1>I'm in deletion</h1>";
        // echo $id;
    $sql1 = "DELETE FROM employee WHERE (employeeID) = '{$id}' ";
    $result = $db->query($sql1);
    if ($sql){
      echo "<h2>One row deleted.</h2>";
      // header("Refresh:0");
    }
    else{
      echo "<h2>Cannot be deleted!</h2>";
    }
  }
}
if (isset($_POST["update_button"])){
  if (isset($_POST["update"]) && isset($_POST["field"])){
    $id = strip_tags($_POST["update"]);
    $field = strip_tags($_POST["field"]);
    $value = strip_tags($_POST["value"]);
    // echo "<h3>".$id."</h3>";
    // echo "<h3>".$field."</h3>";
    // echo "<h3>".$value."</h3>";
    if ($field == 'password')
      $sql2 = "UPDATE employee SET pwd = '{$value}' WHERE employeeID = '{$id}' "; 
    else
      $sql2 = "UPDATE profile SET {$field} = '{$value}' WHERE employeeID = '{$id}' ";         

    $result = $db->query($sql2);
    if ($sql2){
      echo "<h2>One row updated.</h2>";
      // header("Refresh:0");
    }
    else{
      echo "<h2>Cannot be updated!</h2>";
    }
  }

}

?>
<div align="center"><font color="white">_______________________________________________ <span> Manage Users </span> _______________________________________________</font></div>
<div align = "center">
  <form role= "form" action="" method="post">
    <table>
      <tr>
        <th scope="row"><font color="white"> &nbsp; &nbsp;Update ID: &nbsp;</font></th>
        <td><input name="update" type="text" class="form-control" autofocus></td>
        &nbsp; &nbsp;
        <th scope="row"><font color="white"> &nbsp; &nbsp;Field:  &nbsp;</font></th>
        <td><input name="field" type="text" class="form-control" autofocus></td>
        &nbsp; &nbsp;
        <th scope="row"><font color="white"> &nbsp; &nbsp;Value:  &nbsp;</font></th>
        <td><input name="value" type="text" class="form-control" autofocus></td>
        <th scope="row"><font color="white"> &nbsp;&nbsp;&nbsp;</font></th>
        <td>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="update_button" value="Update">Update</button>
        </td>

      </tr>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        
        <th scope="row"><font color="white"> &nbsp; &nbsp;Delete ID: &nbsp;</font></th>
        <td><input name="delete" type="text" class="form-control" autofocus></td>
        <th scope="row"><font color="white"> &nbsp; &nbsp;&nbsp;</font></th>
        <th scope="row"><font color="white"> &nbsp; &nbsp;&nbsp;</font></th>
        <th scope="row"><font color="white"> &nbsp; &nbsp;&nbsp;</font></th>
        <th scope="row"><font color="white"> &nbsp;&nbsp;&nbsp;</font></th>
        <th scope="row"><font color="white"> &nbsp;&nbsp;&nbsp;</font></th>
        <td>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="delete_button" value="Delete">Delete</button>
        </td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>