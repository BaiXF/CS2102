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
  
      

      $origin     =  strip_tags($_POST["origin_input"]);
      $destination   =  strip_tags($_POST["destination_input"]);
      $departure     =  strip_tags($_POST["departure"]);
      $return    =  strip_tags($_POST["return"]);
      
      $sql = "SELECT * from book_flight ORDER BY dept_time ASC";

      $result = $db->query($sql);
      

      $db->close();
  
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BIZ-Tripper </title>
<!-- <script type= "text/javascript" src = "../js/countries2.js"></script> -->
<link rel="stylesheet" type="text/css" href="../main.css">
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
</head>

<body>
<div id = "header">
  <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
  <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
  <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
   <input type="submit" align = "right" onClick="document.location.href = ('superuser.php');" value="back" name="back" id="logout" >
  <br>
</div>

<div id="wrapper">
<h2>Flight Information:<h2>
<div class="error"><?php
     echo $error_msg; 
  ?></div>

<form action="" method="post">
<table cellpadding="10" cellspacing="10" width="50%">

  <tr>
    <th scope="row">Origin: </th>
    <td><input name="origin_input" type="text"></td>
    <!-- <th scope="row">Country: </th>
    <td><select onchange="print_state('state',this.value);" id="country" name = "ori_country"></select></td>
    <th scope="row">City: </th>
    <td><select name ="origin_chosen" id = "state"></select>    
    <script language="javascript">print_country1("country");</script></td> -->
  </tr>

  <tr>
    <th scope="row">Destination: </th>
    <td><input name="destination_input" type="text"></td>
    <!-- <th scope="row">Country: </th>
    <td><select onchange="print_state('state',this.value);" id="country" name = "des_country"></select></td>
    <th scope="row">City: </th>
    <td><select name ="destination_chosen" id = "state"></select>
    <script language="javascript">print_country("country");</script></td> -->
  </tr>

  <tr>
    <th scope="row">Departure Date: </th>
    <td><input name="departure" type="date"></td>
  </tr>

  <tr>
    <th scope="row">Return Date: </th>
    <td><input name="return" type="date"></td>
  </tr>

  <tr>
    <th colspan="2" align = "center" scope="row"><input type="submit" value = "submit" name="submit"></th>
  </tr>
</table>
</form>
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
        echo "<tr>";
        echo "<td>$index</td>";
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
          header("Refresh:0");
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
        echo "<h3>".$id."</h3>";
        echo "<h3>".$field."</h3>";
        echo "<h3>".$value."</h3>";
        if ($field == 'password')
          $sql2 = "UPDATE employee SET pwd = '{$value}' WHERE employeeID = '{$id}' "; 
        else
          $sql2 = "UPDATE profile SET {$field} = '{$value}' WHERE employeeID = '{$id}' ";         

        $result = $db->query($sql2);
        if ($sql2){
          echo "<h2>One row updated.</h2>";
          header("Refresh:0");
        }
        else{
          echo "<h2>Cannot be updated!</h2>";
        }
      }

    }
  
?>
<div>
<form action="" method="post">
<table>
    <tr>
    <th scope="row">Delete ID: </th>
    <td><input name="delete" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>
    <td><input type="submit" name="delete_button" value="Delete" /></td>
    
  </tr>

  <tr>
    <th scope="row">Update ID: </th>
    <td><input name="update" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>
    <th scope="row">Field: </th>
    <td><input name="field" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>
    <th scope="row">Value: </th>
    <td><input name="value" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>
    <td><input type="submit" name="update_button" value="Update" /></td>
  </tr>
</table>
</form>
</div>
</body>
</html>