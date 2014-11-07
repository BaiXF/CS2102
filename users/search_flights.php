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

        if (!isset($_SESSION['dept'])){
          $_SESSION['dept'] = $departure;
        }

        if (!isset($_SESSION['rtrn'])){
          $_SESSION['rtrn'] = $return;
        }

        $sql1 = "SELECT * from flights where origin like '%$origin%' and destination like '%$destination%' and capacity > occupied and '{$departure}' = date(dept_time)";


        $sql2 = "SELECT * from flights where origin like '%$destination%' and destination like '%$origin%' and capacity > occupied and '{$return}' = date(dept_time)";

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
    <!-- <script type= "text/javascript" src = "../js/countries2.js"></script> 
      <link rel="stylesheet" type="text/css" href="../main.css">-->
      <link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="signin.css" rel="stylesheet">
      <script src="./Carousel Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
      <link href="http://getbootstrap.com/examples/carousel/carousel.css" rel="stylesheet">
      <script type= "text/javascript" src = "../js/countries2.js"></script>
      <script type= "text/javascript" src = "../js/countries1.js"></script>
      <script src="../Carousel Template for Bootstrap_files/jquery.min.js"></script>
      <script src="../Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
      <script src="../Carousel Template for Bootstrap_files/docs.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="../bootstrap/js/*.js"></script>
        <style type="text/css">
      body {
        background-image:url(../images/skyfly.jpg);
        background-repeat:no-repeat;
        background-size:cover;
      }
      </style>
    </head>

    <body>
    <!--
    <div id = "header">
      <img src = "../images/logo.jpg" height = 100> &nbsp; &nbsp;
      <font size="25" color="black"><b>BIZ-Tripper Online Booking System</b></font> 
      <input type="submit" align = "right" onClick="document.location.href = ('../logout.php');" value="logout" name="logout" id="logout" >
       <input type="submit" align = "right" onClick="document.location.href = ('user.php');" value="back" name="back" id="logout" >
      <br>
    </div>
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
                <li><a href="user.php">Home</a></li>

                <li><a href="./profile.php">Profile</a></li>
                <li class="active"><a href="./search_flights.php">Search for Flight</a></li>
                <li><a href="./my_bookings.php">My Bookings</a></li>
                <li class="nav navbar-nav navbar-right">
                  <a href="../index.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div>
      <br><br><br><br><br><br>
    </div>
    <div id="wrapper" class="container">
      <div class="error"><?php
      echo $error_msg; 
      ?></div>

      <form action="" method="post" align="center" style="color:white"> 
        <table align="center">
          <tr>
            <td><br><br><br></td>
          </tr>
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
          <td><br></td>
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
          <td><br></td>
        </tr>
        <tr>
          <th scope="row">Departure Date: </th>
          <td><input name="departure" value="<?php echo $_SESSION['dept'];?>" type="date"></td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <th scope="row">Return Date: </th>
          <td><input name="return" value="<?php echo $_SESSION['rtrn'];?>" type="date"></td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
      </table>
      <div class="container" align="center" width="300px">
        <button class="btn btn-lg btn-default" type="submit" width="300px" align="center">Submit</button>

      </div>

    </form>
    </div>

    <div id = 'results_dept' align="center" style="color:white">
      <h2> Depart: </h2>
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
        <form action="" method="post" style="color:white">
          <table>
            <tr>
              <th scope="row">Depart Flight No. Chosen:&nbsp; &nbsp;</th>
              <td><input name="flight_dept" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>   
            </tr>
            <tr>
              <td><br></td>
            </tr>

            <tr>
              <th scope="row">Return Flight No. Chosen:&nbsp; &nbsp;</th>
              <td><input name="flight_rtrn" type="text">&nbsp; &nbsp;&nbsp; &nbsp;</td>   
            </tr>
            <!--<tr>
              <th scope="row"></th><th scope="row"></th>
              <td><input type="submit" value = "BOOK" name="book"></td>   
            </tr>-->
                        <tr>
              <td><br></td>
            </tr>
          </table>
                <div class="container" align="center" width="300px">
        <button class="btn btn-lg btn-default" type="submit" width="300px" align="center">Book</button>

      </div>
        </form>
        <br>


      </div>
      <?php 
      
      global $usname;

      $result = '';
      $departure = '';
      $return = '';
      
      
      if(isset($_POST["departure"]))
        $departure = strip_tags($_POST["departure"]);
      if(isset($_POST["return"])) 
        $return = strip_tags($_POST["return"]);

      echo $usname;
      if (isset($_SESSION['dept']) && isset($_SESSION['rtrn'])){
        echo $_SESSION['dept'];
        echo $_SESSION['rtrn'];
      }
      else{
        echo "ERROR";
      }

      
      if(isset($_POST["book"])){

        $user = 'root';
        $pass = '';
        $db = 'biz_tripper';
        $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to DB");

        if (!isset($_POST["flight_dept"]) || !isset($_POST["flight_rtrn"]) || $_POST["flight_dept"]=='' || $_POST["flight_rtrn"]==''){
          echo "Please Input The Flight No.";
        }
        else{
          $flight_d = strip_tags($_POST["flight_dept"]);
          $flight_r = strip_tags($_POST["flight_rtrn"]);

          echo $flight_d;
          echo $flight_r;
          $d = $_SESSION['dept'];
          $r = $_SESSION['rtrn'];

          $sql31 = "UPDATE flights SET occupied = occupied+1 WHERE flight_no = '{$flight_d}' AND '{$d}' = date(dept_time)";
          echo $sql31;
          $result31 = $db->query($sql31);

          $sql32 = "SELECT passportNo, employeeID FROM profile WHERE employeeID = '{$usname}'";
          $result32 = $db->query($sql32);
          $row =$result32->fetch_assoc();
          $passport = $row['passportNo'];
          $eid = $row['employeeID'];
          echo $passport;

          $sql33 = "SELECT dept_time FROM flights WHERE flight_no = '{$flight_d}' AND '{$d}' = date(dept_time)";
          $result33 = $db->query($sql33);
          $row =$result33->fetch_assoc();
          $dept_time = $row['dept_time'];
          echo $dept_time;

          $sql34 = "INSERT INTO book_flight (passportNo, id, flight_no, dept_time) VALUES ('{$passport}', '{$eid}' '{$flight_d}', '{$dept_time}')";
          echo "<br>".$sql34;
          $result34 = $db->query($sql34);

          $sql41 = "UPDATE flights SET occupied = occupied+1 WHERE flight_no = '{$flight_r}' AND '{$r}' = date(dept_time)";
          echo $sql41;
          $result41 = $db->query($sql41);

          $sql43 = "SELECT dept_time FROM flights WHERE flight_no = '{$flight_r}' AND '{$r}' = date(dept_time)";
          $result43 = $db->query($sql43);
          $row =$result43->fetch_assoc();
          $arri_time = $row['dept_time'];
          echo $arri_time;

          $sql44 = "INSERT INTO book_flight (passportNo, id, flight_no, dept_time) VALUES ('{$passport}', '{$eid}', '{$flight_r}', '{$arri_time}')";
          echo "<br>".$sql44;
          $result44 = $db->query($sql44);
        }
        
      }
    
      ?>
</body>
</html>


