<?php
include "../include/common.inc.php";
session_start();

if(isset($_SESSION['username'])){

  $usname = $_SESSION['username'];
  $error_msg = "";

  $user = 'root';
  $pass = '';
  $db = 'biz_tripper';
  $result = '';

  $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
     
  $sql = "SELECT * from book_flight WHERE id='{$usname}' ORDER BY dept_time ASC";

  $result = $db->query($sql);
      

  $db->close();
  
} 
else{
  $msg = "You are not logged in yet.";
  echo $msg;
  header('Location: ../logout.php');
}
?>

<?php  
  global $result;
  $user = 'root';
  $pass = '';
  $db = 'biz_tripper';
  $result1 = '';

  $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");
     

  $index = 1;
  echo "<table>";
  echo "<tr>";

  if ($result->num_rows > 0){
        //echo "<h1> something here!</h1>";   
        echo "<td>Index&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "<td>Employee ID&nbsp; &nbsp;&nbsp; &nbsp;</td>";
        echo "<td>Passport No. &nbsp; &nbsp;&nbsp; &nbsp; </td>";
        echo "<td>Flight No.&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>Origin.&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>Destination No.&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "<td>Departure Time&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; </td>";
        echo "<td>Arrival Time&nbsp; &nbsp;&nbsp; &nbsp;  </td>";
        echo "</tr>";   
  while( ($row =$result->fetch_assoc()))
    {   
          // echo "<h1> something here!</h1>";
      // echo $row['flight_no'];
      // echo $row['dept_time'];
    $sql1 = "SELECT origin, destination, arri_time FROM flights WHERE flight_no = '{$row['flight_no']}' AND dept_time = '{$row['dept_time']}' ";
      // echo "<br>".$sql1;
		$result1 = $db->query($sql1);
		if ($result1->num_rows > 0){
          // echo "<h1> something here!</h1>";
			$row1 =$result1->fetch_assoc();	
        	$row['index'] = $index;
        	echo "<tr>";
        	echo "<td>".$row['index']."</td>";
        	$index = $index + 1;
        	echo "<td>".$row['id']."</td>";
        	echo "<td>".$row['passportNo']."</td>";
        	echo "<td>".$row['flight_no']."</td>";
        	echo "<td>".$row1['origin']."</td>";
        	echo "<td>".$row1['destination']."</td>";
        	echo "<td>".$row['dept_time']."</td>";
        	echo "<td>".$row1['arri_time']."</td>";
    	}

    }

    }
    else{
        echo "<tr>";
        echo "<td>nothing selected!</td>";
    }
    echo "</tr>";
    echo "</table>";
?>

<!doctype html>