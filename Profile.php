<?php
session_start();   
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
        <a href="./login.php">
            <img src="img/logo.png" alt="">
        </a>
        <a href="./Profile.php">
          <img src="img/user.png" class="user" alt="">
        </a>
    </div>
        <br> <br> 
        <div class="userCard">
            <img src="img/profile.png" alt="">

            <p><?php         
 $con = mysqli_connect("localhost", "root", "", "OneWay");
   //Retrieving the contents of the table
   $res = mysqli_query($con, "SELECT FNAME, LNAME FROM CUSTOMERS where EMAIL='{$_SESSION['user']}'");

   $result =  mysqli_query($con, "SELECT count(*)  FROM flights JOIN orders ON flights.FLIGHT_ID = orders.FLIGHT_ID JOIN customers ON customers.EMAIL = orders.EMAIL WHERE orders.EMAIL = '{$_SESSION['user']}'");

   while ($row = mysqli_fetch_row($res)) {
      echo("".$row[0]." ".$row[1]."\n");
  
   }
   //Closing the statement
   mysqli_free_result($res);
 //Closing the connection
   mysqli_close($con);
 ?> </p>



            <p class="email"><?php echo $_SESSION['user']; ?></p>
            <?php
					while($row1 = $result->fetch_assoc()){
			?>
            <p> <span><?php echo $row1["count(*)"]; ?></span> Past Flights</p>
            <?php }?>
        </div>
        <div class="acctHeader">
            Past Flights
        </div>

        <?php 
         $con = mysqli_connect("localhost", "root", "", "OneWay");
         $res =  mysqli_query($con,"SELECT FLIGHT_NUM, START_LOC, DEPART_TIME, END_LOC, LAND_TIME, orders.price
         FROM flights
         JOIN orders ON flights.FLIGHT_ID = orders.FLIGHT_ID
         JOIN customers ON customers.EMAIL = orders.EMAIL
            WHERE orders.EMAIL = '{$_SESSION['user']}'");


        ?>


        
        <div class="accountInfo">
        <?php
					while($row = $res->fetch_assoc()){
			?>
            <div class="item">
                <div class="itemImg">
                    <img src="img/plane.png" alt="">
                </div>
                <div class="previous"> 
                    <p><span class="prevFlight">Flight <?php echo $row['FLIGHT_NUM']; ?></span> 
                    </p> 
                    <br>
                    <div class="depArr">
                        <p><span class="city">Depature:  <?php echo $row['START_LOC'];?> <?php echo explode(":00",explode(" ",$row["DEPART_TIME"])[1])[0]; ?></span> <img src="img/arrow.png" alt=""> </p>
                        <p><span class="city">Arrival:  <?php echo $row['END_LOC'];?> <?php echo explode(":00",explode(" ",$row["LAND_TIME"])[1])[0]; ?></span> </p>
                    </div>
                    
                </div>
                <div class="paidAmount">
          
                    <p class="price price2"><sup>$</sup><?php echo $row['price']; ?><sub>USD</sub></p>

                </div>
                
            </div>
            <?php }?>
        </div>
    
       
    
</body>
</html>
