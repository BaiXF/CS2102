<?php

  session_start();
$profpic = "../images/notebook.jpg";
$user = 'root';
$pass = '';
$db = 'biz_tripper';

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
$error_msg = "";

if (isset($_POST)){
if(!isset($_POST["position"]))
  $error_msg="Enter Position Please!";
else if(!isset($_POST["employeeID"]))
  $error_msg="Enter EmployeeID Please!";
else if(!isset($_POST["password"]))
  $error_msg="Enter Password Please!";
else if(!isset($_POST["firstname"]))
  $error_msg="Enter First Name Please!";
else if(!isset($_POST["lastname"]))
  $error_msg="Enter Last Name Please!";
else if(!isset($_POST["passportNo"]))
  $error_msg="Enter Passport Number Please!";
else{

  $position     =  strip_tags($_POST["position"]);
  $employeeID   =  strip_tags($_POST["employeeID"]);
  $password     =  strip_tags($_POST["password"]);
  $firstname    =  strip_tags($_POST["firstname"]);
  $lastname     =  strip_tags($_POST["lastname"]);
  $gender       =  strip_tags($_POST["gender"]);
  $birthday     =  strip_tags($_POST["birthday"]);
  $passportNo   =  strip_tags($_POST["passportNo"]);
  $email        =  strip_tags($_POST["email"]);
  $contactNo    =  strip_tags($_POST["contactNo"]);
  $address      =  strip_tags($_POST["address"]);
  $nationality  =  strip_tags($_POST["country"]);


  $sql1 = "INSERT INTO employee (employeeID, pwd) VALUES ('{$employeeID}', '{$password}')";
  $sql2 = "INSERT INTO profile (employeeID, firstName, lastName, email, address, contactNo, nationality, sex, passportNo, dob, position) VALUES ('{$employeeID}','{$firstname}','{$lastname}', '{$email}', '{$address}', '{$contactNo}', '{$nationality}', '{$gender}', '{$passportNo}', '{$birthday}', '{$position}')";
  
      // mysql_query($sql1,$db) or die(mysql_error());
      // mysql_query($sql2,$db) or die(mysql_error());
  $result1 = $db->query($sql1);
      // if ($result1==false){  die("No record inserted!"); }

  $result2 = $db->query($sql2);
      // if ($result1==true && $result2==false){  
      //     $result3 = $db->query("DELETE FROM employeeID WHERE employeeID = '{$employeeID}' ");
      // }
    
      if ($result1==true && $result2==true){  
          $error_msg = "One Row Inserted!";
      }
  }
}
 $db->close();


?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>BIZ-Tripper </title>
  <script type= "text/javascript" src = "../js/countries2.js"></script>
  <link rel="stylesheet" type="text/css" href="../main.css">
  <link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
  <link href="signin.css" rel="stylesheet">
  <style type="text/css">
    body {
      background-image:url('<?php echo $profpic;?>');
      background-repeat:no-repeat;
      background-position:50% 0%;
      background-size:100% 121%;
    }
  </style>
</head>

<body>
<!--
<div id = "header">
  <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
  <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
  <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
   <input type="submit" align = "right" onClick="document.location.href = ('manage_users.php');" value="back" name="back" id="logout" >
  <br>
</div>
-->
<script src="js/bootstrap.min.js"></script>
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
                <li><a href="/new_user">New user</a></li>
                <li><a href="/search_user">Search user</a></li>
                <li><a href="/update_user">Update user</a></li>
                <li><a href="/delete_user">Delete user</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="manage_users.php" class="dropdown-toggle" data-toggle="dropdown">Manage Airlines <span class="caret"></span></a>
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

<div id="wrapper">
<div class="error"><?php 
    echo $error_msg; 
    // $_POST = array();
    ?></div>

  </div>
</div>
<br><br><br><br>

  <div align = "center">
    <form role="form" action="" method="post">
      <table align="center">
        <tr>
          <th scope="row">Position *: </th>
          <td><input name="position" type="text" class="form-control" autofocus/></td>
        </tr>
        <tr>
          <th scope="row">Employee ID *: </th>
          <td><input name="employeeID" type="text" class="form-control" autofocus/></td>
        </tr>
        <tr>
          <th scope="row">Password *: </th>
          <td><input type="password" name="password" class="form-control" autofocus/></td>
        </tr>
        <tr>
          <th scope="row">First Name *: </th>
          <td><input name="firstname" type="text" class="form-control" autofocus/></td>
        </tr>
        <tr>
          <th scope="row">Last Name *: </th>
          <td><input name="lastname" type="text" class="form-control" autofocus/></td>
        </tr>
        <tr>
          <th scope="row">Passport No *: </th>
          <td><input name="passportNo" type="text" class="form-control" autofocus/></td>
        </tr>
        <tr>
          <th scope="row">Gender: </th>
          <td><select name="gender">
            <option value="M">M</option>
            <option value="F">F</option>
            &nbsp;</select></td>
          </tr>
          <tr>
            <th scope="row">Birthday: </th>
            <td><input type="date" name="birthday" class="form-control" autofocus/></td>
          </tr>
          <tr>
            <th scope="row">Email: </th>
            <td><input type="email" name="email" class="form-control" autofocus/></td>
          </tr>
          <tr>
            <th scope="row">Contact No: </th>
            <td><input type="integer" name="contactNo" class="form-control" autofocus/></td>
          </tr>
          <tr>
            <th scope="row">Address: </th>
            <td><input type="text" name="address" class="form-control" autofocus/></td>
          </tr>
          <tr>
            <th scope="row">Nationality: </th>
            <td><select onchange="print_state('state',this.value);" id="country" name = "country"></select></td>
          </tr>
          <script language="javascript">print_country("country");</script></td>
          <tr>
            <td>
              <button class="btn btn-lg btn-primary btn-block" type="submit" value = "Submit" name="submit">Submit</button>
            </td>
          </tr>
          <tr>
            <th scope = "row" align = "right" ><p> *: Compulsive Area. </p></th>
          </tr>
        </table>
      </form>
    </div>
  </div>
</body>
</html>