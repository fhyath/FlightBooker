
<!-- include "debug.php";
session_start();
$localhost = "localhost";
$username = "root";
$password = "root";
$dbname = "oneway";
$user = $_SESSION["user"];
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
console_log($_SESSION["user"]);
$sql = "SELECT * FROM customers WHERE EMAIL ='$user' ";
console_log($sql);
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // console_log("values available");
      echo "email: " . $row["email"]."<br>";
    }
  } else {
    //   console_log("no results");
    echo "0 results";
  }

$conn->close();
console_log($result) -->



<?php
session_start();
include 'debug.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>One-Way</title>
</head>
<body class="paymentBody">

    <div class="headerBar">
        <img src="img/logo.png" alt="">
        <a href="./Profile.html">
          <img src="img/user.png" class="user" alt="">
        </a>
    </div>
        <br> <br> 
        <div class="userCard">
            <img src="img/profile.png" alt="">

            <p><?php
            $user = $_SESSION["user"];
 $con = mysqli_connect("localhost", "root", "root", "OneWay");
   //Retrieving the contents of the table

   
   $res = mysqli_query($con, "SELECT FNAME FROM CUSTOMERS WHERE EMAIL ='$user'");

   while ($row = mysqli_fetch_row($res)) {
      echo("".$row[0]."\n");

   }
   //Closing the statement
   mysqli_free_result($res);
 //Closing the connection
   mysqli_close($con);
 ?> </p>
        </a>
    </div>
        <br> <br> 
        <div class="acctHeader">
            Past Flights
        </div>
        <div class="accountInfo">
            <div class="item">
                <div class="itemImg">
                    <img src="img/plane.png" alt="">
                </div>
                <div class="previous"> 
                    <p><span class="prevFlight">Flight 25695 (04/21/2021)</span> 
                    </p> 
                    <br>
                    <div class="depArr">
                        <p><span class="city">Depature: Barcelona (10:30 AM) </span> <img src="img/arrow.png" alt=""> </p>
                        <p><span class="city">Arrival: Rome (3:30 PM) </span> </p>
                    </div>
                    
                </div>
                <div class="paidAmount">
                    <p>*****4568</p>
                    <p class="price price2"><sup>$</sup>93<sub>USD</sub></p>

                </div>
                
            </div>
            <div class="item">
                <div class="itemImg">
                    <img src="img/plane.png" alt="">
                </div>
                <div class="previous">
                    <p><span class="prevFlight">Flight 41555 (03/18/2021)</span> 
                    </p> 
                    <br>
                    <div class="depArr">
                        <p><span class="city">Depature: New York (11:30 AM) </span> <img src="img/arrow.png" alt=""> </p>
                        <p><span class="city">Arrival: Atlanta (1:00 PM) </span> </p>
                    </div>
                    
                </div>
                <div class="paidAmount">
                    <p>*****4568</p>
                    <p class="price price2"><sup>$</sup>93<sub>USD</sub></p>

                </div>
                
            </div>
            <div class="item">
                <div class="itemImg">
                    <img src="img/plane.png" alt="">
                </div>
                <div class="previous">
                    <p><span class="prevFlight">Flight 12188 (12/28/2020)</span> 
                    </p> 
                    <br>
                    <div class="depArr">
                        <p><span class="city">Depature: New York (11:30 AM) </span> <img src="img/arrow.png" alt=""> </p>
                        <p><span class="city">Arrival: Atlanta (1:00 PM) </span> </p>
                    </div>
                </div>
                <div class="paidAmount">
                    <p>*****4568</p>
                    <p class="price price2"><sup>$</sup>93<sub>USD</sub></p>

                </div>
                
            </div>
           
        </div>
       
    
</body>
</html>










