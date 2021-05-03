<?php session_start();

?>

<!DOCTYPE html>
<?php
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

  $update = "UPDATE seats
                  set $availVar = $availVar-1
                  WHERE SEAT_ID = $num;";
  // echo $update;
  if(mysqli_query($con, $update)){
     // echo "Records added successfully.";
  } else{
      echo "ERROR: Could not able to execute $update. " . mysqli_error($con);
  }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Receipt</title>  
</head>


    <body class="recieptbg">
        <div class="headerBar">
            <img src="img/logo.png" alt="">
            <a href="./Profile.html">
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
                    <span>BCA</span>
                    <span class="date">10:30</span>
                  </div>
                  <i class="fa fa-plane"></i>
                  <div class="to">
                    <span>RME</span>
                    <span class="date">01:15</span>
                  </div>       
                </div>
                <!-- /Airports -->
                <!-- Info -->
                <div class="info">
                  <div class="your-trip">
                    <span class="title">Your Trip</span>
                    <span class="from">BARCELONA</span>
                    <span class="to">ROME</span>
                  </div>
                  
                  <div class="details">
                    <div>
                      <span class="title">Flight</span>
                      <span class="flight">12283</span>
                    </div>
                    <div>
                      <span class="title">Gate</span>
                      <span class="gate">49</span>
                    </div>
                    <div>
                      <span class="title">Seat</span>
                      <span class="seat">7B</span>
                    </div>
                    <div>
                      <span class="title">Board at</span>
                      <span class="board-at">10:30</span>
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