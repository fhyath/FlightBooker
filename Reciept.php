<?php 
session_start();
include "getCity.php";
?>

<!DOCTYPE html>
<?php
// var_dump($_SESSION);
include "debug.php";
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "oneway";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}

if( isset($_POST['submit1'] )){
  $num = $_SESSION["flight_id"];
  $classtype = $_SESSION["class"];
  //echo $classtype;
  if ($classtype == "business"){
    $availVar = "B_AVAILABILITY";
  }
 else if ($classtype == "fc"){
    $availVar = "FC_AVAILABILITY";
 }else{
    $availVar = "E_AVAILABILITY";
 }

 
  $currentTime = date("Y-m-d H:i:s",time());

  $update = "UPDATE seats
                  set $availVar = $availVar-1
                  WHERE SEAT_ID = $num;";

  $insert = "INSERT INTO orders (EMAIL, FLIGHT_ID,PRICE,ORDER_DATE) VALUES('{$_SESSION['user']}','{$_SESSION['flight_id']}','{$_SESSION['price']}','{$currentTime}')";
  console_log($insert);
  
 // echo $update;
  if(mysqli_query($con, $update)){
     // echo "Records added successfully.";
  } else{
      echo "ERROR: Could not able to execute $update. " . mysqli_error($con);
  }

  if(mysqli_query($con, $insert)){
    // echo "Records added successfully.";
 } else{
     echo "ERROR: Could not able to execute $insert. " . mysqli_error($con);
 }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Receipt</title>  
</head>


    <body class="recieptbg">
        <div class="headerBar">
            <a href="./login.php">
                <img src="img/logo.png" alt="">
            </a>
            <a href="./Profile.php">
              <img src="img/user.png" class="user" alt="">
            </a>
        </div>
        <br><br><br><br><br><br>

        <div class="reciept">
            <div class="thanks">
                <p>Thank you for choosing <br> <img src="img/logo.png" alt="">
                </p>
                
            </div>
            
            <div id="bp">
      
                <!-- Header -->
                <div class="header">
                  <span>Boarding Pass</span>
                </div>
                <!-- /Header -->
                <!-- Airports -->
                <div class="airports">
                  <div class="from">
                    <span><?= $_SESSION["start_loc"] ?></span>
                    <span class="date"><?php echo explode(":00",explode(" ",$_SESSION["depart_time"])[1])[0] ?></span>
                  </div>
                  <i class="fa fa-plane"></i>
                  <div class="to">
                    <span><?= $_SESSION["end_loc"]?></span>
                    <span class="date"><?php echo explode(":00",explode(" ",$_SESSION["land_time"])[1])[0] ?></span>
                  </div>       
                </div>
                <!-- /Airports -->
                <!-- Info -->
                <div class="info">
                  <div class="your-trip">
                    <span class="title">Your Trip</span>
                    <span class="from"><?php echo getCity($_SESSION["start_loc"])?></span>
                    <span class="to"><?php echo getCity($_SESSION["end_loc"])?></span>
                  </div>
                  
                  <div class="details">
                    <div>
                      <span class="title">Flight</span>
                      <span style="padding: 0px !important;"><?= $_SESSION["flight_num"]?></span>
                    </div>
                    <div>
                      <span class="title"></span>
                      <span class="gate"></span>
                    </div>
                    <div>
                      <span class="title"></span>
                      <span class="seat"></span>
                    </div>
                    <div>
                      <span class="title">Board at</span>
                      <span class="board-at"><?php echo date('H:i',(strtotime(explode(":00",explode(" ",$_SESSION["depart_time"])[1])[0])-3600)) ?></span>
                    </div>
                    
                  </div>
                </div>
                <!-- /Info -->
  
                
              </div>
              


              <div class="thanks2">
                <p>Hope you can find your way back  <br> 
                </p>
                
            </div>
        </div>
    </body>
</html>