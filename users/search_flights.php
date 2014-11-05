<?php
  session_start();
 
    $error_msg = "";
 
     if(!isset($_SESSION['username'])){
        header('Location: ../logout.php');
     }
      $user = 'root';
      $pass = '';
      $db = 'biz_tripper';
      $result = '';

      if (isset($_SESSION['username'])){
          $usname = $_SESSION['username'];
      }

      if(isset($_POST['submit'])){

      $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
      $error_msg = "";
  
      if(!isset($_POST["origin_input"]) || $_POST["origin_input"]==""){
        $error_msg="Enter Origin Please!";
      }
      else if(!isset($_POST["destination_input"]) || $_POST["destination_input"]==""){
        $error_msg="Enter Destination Please!";
      }
      else if(!isset($_POST["departure"]) || $_POST["departure"]==""){
        $error_msg="Enter Departure Date Please!";
      }
      else if(!isset($_POST["return"]) || $_POST["return"]==""){
        $error_msg="Enter Return Date Please!";
      }
      else{

      $origin     =  strip_tags($_POST["origin_input"]);
      $destination   =  strip_tags($_POST["destination_input"]);
      $departure     =  strip_tags($_POST["departure"]);
      $return    =  strip_tags($_POST["return"]);
      
      $sql1 = "SELECT * from flights f where f.origin like '%$origin%' and f.destination like '%$destination%' and f.capacity > f.occupied and '{$departure}' IN ( select date(dept_time) from flights g WHERE g.flight_no = f.flight_no and g.origin = f.origin)";


      $sql2 = "SELECT * from flights f where f.origin like '%$destination%' and f.destination like '%$origin%' and f.capacity > f.occupied and '{$return}' IN ( select date(dept_time) from flights g WHERE g.flight_no = f.flight_no and g.origin = f.origin)";

      $result1 = $db->query($sql1);
      $result2 = $db->query($sql2);
      }
  
      $db->close();
  }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BIZ-Tripper </title>
<!-- <script type= "text/javascript" src = "../js/countries2.js"></script> -->
<link rel="stylesheet" type="text/css" href="../main.css">
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
<script type= "text/javascript" src = "../js/countries2.js"></script>
<script type= "text/javascript" src = "../js/countries1.js"></script>
</head>

<body>
<div id = "header">
  <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
  <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
  <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
   <input type="submit" align = "right" onClick="document.location.href = ('user.php');" value="back" name="back" id="logout" >
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
    <td><input name="origin_input"  type="text"></td>
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
    <td><input name="departure" value="<?php echo $departure;?>" type="date"></td>
  </tr>

  <tr>
    <th scope="row">Return Date: </th>
    <td><input name="return" value="<?php echo $return;?>" type="date"></td>
  </tr>

  <tr>
    <th colspan="2" align = "center" scope="row"><input type="submit" value = "submit" name="submit"></th>
  </tr>
</table>
</form>
</div>
<h2> Depart: </h2>
<div id = 'results_dept'>
<?php  
  global $result1;
  $index = 1;
  echo "<table>";
  echo "<tr>";

  if ($result1->num_rows > 0){
        // echo "something selected";        
        echo "<td>Index&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "<td>Flight No.&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "<td>Origin&nbsp; &nbsp;&nbsp; &nbsp; </td>";
        echo "<td>Destination&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>Departure Time &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>Arrival Time &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "</tr>";   
  while( ($row =$result1->fetch_assoc()))
    {   
        echo "<tr>";
        echo "<td>$index</td>"; 
        $index = $index + 1;
        // echo "<td><input  type='submit' value = '$row['flight_no']' name='submit'></td>";
        echo "<td>".$row['flight_no']."</td>";
        echo "<td>".$row['origin']."</td>";
        echo "<td>".$row['destination']."</td>";
        echo "<td>".$row['dept_time']."</td>";
        echo "<td>".$row['arri_time']."</td>";
    }

    }
    else{
        $error_msg = "<td>Nothing Selected!</td>";
    }
    echo "</tr>";
    echo "</table>";
?>

<h2>Return: </h2>

<?php  
  global $result2;
  $index = 1;
  echo "<table>";
  echo "<tr>";

  if ($result2->num_rows > 0){
        // echo "something selected";        
        echo "<td>Index&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "<td>Flight No.&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "<td>Origin&nbsp; &nbsp;&nbsp; &nbsp; </td>";
        echo "<td>Destination&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>Departure Time &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>Arrival Time &nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "</tr>";   
  while( ($row =$result2->fetch_assoc()))
    {   
        echo "<tr>";
        echo "<td>$index</td>"; 
        $index = $index + 1;
        // echo "<td><input  type='submit' value = '$row['flight_no']' name='submit'></td>";
        echo "<td>".$row['flight_no']."</td>";
        echo "<td>".$row['origin']."</td>";
        echo "<td>".$row['destination']."</td>";
        echo "<td>".$row['dept_time']."</td>";
        echo "<td>".$row['arri_time']."</td>";
    }
    }
    else{
        $error_msg = "<td>Nothing Selected!</td>";
    }
    echo "</tr>";
    echo "</table>";
?>

<div>
<br>
<form action="" method="post">
<table>
  <tr>
    <th scope="row">Depart Flight No. Chosen:&nbsp; &nbsp;</th>
    <td><input name="flight_dept" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>   
  </tr>
    <tr>
    <th scope="row">Return Flight No. Chosen:&nbsp; &nbsp;</th>
    <td><input name="flight_rtrn" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>   
  </tr>
  <tr>
    <th scope="row"></th><th scope="row"></th>
    <td><input type="submit" value = "BOOK" name="book"></td>   
  </tr>
</table>
</form>
<br>


</div>
<?php 
  
  global $usname;
  $user = 'root';
  $pass = '';
  $db = 'biz_tripper';
  $result = '';
  $departure_copy = '';
  $return_copy = '';
  
  
  if(isset($_POST["departure"]))
    $departure_copy = strip_tags($_POST["departure"]);
  if(isset($_POST["return"])) 
    $return_copy = strip_tags($_POST["return"]);

  echo $usname;
  echo $departure_copy;
  echo $return_copy;

  $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
  if(isset($_POST["book"])){

    if (!isset($_POST["flight_dept"]) || !isset($_POST["flight_rtrn"]) || $_POST["flight_dept"]=='' || $_POST["flight_rtrn"]==''){
      echo "Please Input The Flight No.";
    }
    else{
      $flight_d = strip_tags($_POST["flight_dept"]);
      $flight_r = strip_tags($_POST["flight_rtrn"]);

      echo $flight_d;
      echo $flight_r;
      

      // echo strip_tags($_SESSION(['rtrn']));
      
        // $sql31 = "UPDATE flights SET occupied = occupied+1  WHERE flight_no = '{$flight_d}' AND dept_time = '{$departure_copy}'";
        // $result31 = $db->query($sql31);
        
        // $sql32 = "SELECT passportNo FROM profile WHERE employeeID = '{$usname}'";
        // $result32 = $db->query($sql32);
        // $row =$result32->fetch_assoc();
        // $passport = $row['passportNo'];

        // $sql33 = "INSERT INTO book_flight (passportNo, flight_no, dept_time) VALUES ('{$passport}', '{$flight_d}', '{$departure_copy}')";
        // $result33 = $db->query($sql33);

        // $sql41 = "UPDATE flights SET occupied = occupied+1  WHERE flight_no = '{$flight_r}' AND dept_time = '{$return_copy}'";
        // $result41 = $db->query($sql41);

        // $sql43 = "INSERT INTO book_flight (passportNo, flight_no, dept_time) VALUES ('{$passport}', '{$flight_r}', '{$return_copy}')";
        // $result43 = $db->query($sql43);
    }
    
  }
  
?>