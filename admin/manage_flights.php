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
</head>

<body>
<div id = "header">
  <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
  <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
  <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
   <input type="submit" align = "right" onClick="document.location.href = ('superuser.php');" value="back" name="back" id="logout" >
  <br>
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
<form action="" method="post">
<table>
    <tr>
    <th scope="row">Empolyee ID: </th>
    <td><input name="employeeID" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>
    </tr>

    <tr>
    <th scope="row">Flight No.: </th>
    <td><input name="flightNo" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>
    </tr>
    
    <tr>
    <th scope="row">Date: </th>
    <td><input name="date" type="date">&nbsp; &nbsp;&nbsp; &nbsp;</td>
    </tr>
    
    <tr>
    <td><input type="submit" name="delete_button" value="Delete" /></td>
    </tr>

</table>
</form>
</div>
</body>
</html>