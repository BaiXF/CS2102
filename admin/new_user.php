<?php
  // session_start();
    
      $user = 'root';
      $pass = '';
      $db = 'biz_tripper';

      $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
      $error_msg = "";

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
      $db->close();
  }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BIZ-Tripper </title>
<script type= "text/javascript" src = "../js/countries2.js"></script>
<link rel="stylesheet" type="text/css" href="../main.css">
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
</head>

<body>
<div id = "header">
  <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
  <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
  <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
  <br>
</div>

<div id="wrapper">
<div class="error"><?php 
    echo $error_msg; ?></div>

<form action="" method="post">
<table cellpadding="10" cellspacing="10" width="50%">
  <tr>
    <th scope="row">Position *: </th>
    <td><input name="position" type="text"></td>
  </tr>
  <tr>
    <th scope="row">Employee ID *: </th>
    <td><input name="employeeID" type="text"></td>
  </tr>
  <tr>
    <th scope="row">Password *: </th>
    <td><input type="password" name="password"></td>
    </tr>
  <tr>
    <th scope="row">First Name *: </th>
    <td><input name="firstname" type="text"></td>
  </tr>
  <tr>
    <th scope="row">Last Name *: </th>
    <td><input name="lastname" type="text"></td>
  </tr>
   <tr>
    <th scope="row">Passport No *: </th>
    <td><input name="passportNo" type="text"></td>
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
    <td><input type="date" name="birthday"></td>
    </tr>
  <tr>
    <th scope="row">Email: </th>
    <td><input type="email" name="email"></td>
    </tr>
  <tr>
    <th scope="row">Contact No: </th>
    <td><input type="integer" name="contactNo"></td>
    </tr>
  <tr>
    <th scope="row">Address: </th>
    <td><input type="text" name="address"></td>
    </tr>
  <tr>
    <th scope="row">Nationality: </th>
    <td><select onchange="print_state('state',this.value);" id="country" name = "country"></select></td>
    </tr>
   <script language="javascript">print_country("country");</script></td>
  <tr>
    <th colspan="2" align = "center" scope="row"><input type="submit" value = "submit" name="submit"></th>
  </tr>
  <tr>
    <th scope = "row" align = "right" ><p> *: Compulsive Area. </p></th>
  </tr>
</table>
</form>
</div>

</body>
</html>