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
        if(isset($_POST["firstName"]))
          $firstname    =  strip_tags($_POST["firstname"]);
        else 
          $firstname = '';
        if(isset($_POST["lasttName"]))
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
<h2>Please input information in the fields below<h2>
<div class="error"><?php 
    echo $error_msg; ?></div>

<form action="" method="post">
<table cellpadding="10" cellspacing="10" width="50%">
  <tr>
    <th scope="row">          </th>
    <td> <input type="submit" value="Search All" name="all" ></td>
  </tr>
  <tr>
    <th scope="row">Position: </th>
    <td><input name="position" type="text"></td>
  </tr>
  <tr>
    <th scope="row">Employee ID: </th>
    <td><input name="employeeID" type="text"></td>
  </tr>
  <tr>
    <th scope="row">Password: </th>
    <td><input type="password" name="password"></td>
    </tr>
  <tr>
    <th scope="row">First Name: </th>
    <td><input name="firstname" type="text"></td>
  </tr>
  <tr>
    <th scope="row">Last Name: </th>
    <td><input name="lastname" type="text"></td>
  </tr>
   <tr>
    <th scope="row">Passport No: </th>
    <td><input name="passportNo" type="text"></td>
  </tr>
  <tr>
    <th scope="row">Gender: </th>
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
    <th scope="row">Email: </th>
    <td><input type="text" name="email"></td>
    </tr>
  <tr>
    <th scope="row">Contact No: </th>
    <td><input type="text" name="contactNo"></td>
    </tr>
  <tr>
    <th scope="row">Address: </th>
    <td><input type="text" name="address"></td>
    </tr>
 <!--  <tr>
    <th scope="row">Nationality: </th>
    <td><select onchange="print_state('state',this.value);" id="country" name = "country"></select></td>
    </tr>
   <script language="javascript">print_country("country");</script></td> -->
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