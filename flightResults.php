<?php session_start();
?>
<!DOCTYPE html>
<?php
include "debug.php";
include "getCity.php";
$localhost = "localhost";
$username = "root";
$password = "root";
$dbname = "OneWay";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM flights, seats where flights.FLIGHT_ID = seats.FLIGHT_ID";
if( isset($_POST['from']) && isset($_POST['dest']) && isset($_POST['date']) && isset($_POST['class'])){
    $from = mysqli_real_escape_string($con, htmlspecialchars($_POST['from']));
	$dest = mysqli_real_escape_string($con, htmlspecialchars($_POST['dest']));
    $date = mysqli_real_escape_string($con, htmlspecialchars($_POST['date']));
    $class = mysqli_real_escape_string($con, htmlspecialchars($_POST['class']));

    $sql = "SELECT * FROM flights, seats WHERE START_LOC ='$from'and END_LOC ='$dest' and DEPART_TIME LIKE '$date%' and flights.FLIGHT_ID = seats.FLIGHT_ID ";
}
$result = $con->query($sql);


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>One-Way</title>  
</head>
<body>
    <div class="headerBar">
        <img src="img/logo.png" alt="">
        <a href="./Profile.html">
          <img src="img/user.png" class="user" alt="">
        </a>
    </div>
    
    <div class="prevInfo">
    <div class="enteredDepart">
            <img src="img/pin.png" alt="">
            <p> <span class="flyingFrom">Flying from</span>  <br><?php echo $from ?></p>
        </div>
        <div class="enteredDepart">
            <img src="img/pin.png" alt="">
            <p> <span class="flyingFrom">Flying to</span>  <br> <?php echo $dest ?> </p>
        </div>
        <div class="enteredDate">
            <img class="cal" src="img/cal.png" alt="">
            <p> <span class="flyingFrom">Departing</span>  <br> <?php echo $date?></p>
        </div>
        <div class="enteredDate">
            <img class="cal" src="img/cal.png" alt="">
            <p> <span class="flyingFrom">Class</span>  <br> <?php echo $class;$_SESSION["class"] = $_POST['class'];?></p>
        </div>
        <!-- <div class="enteredDate carType">
                    <select>
                        <option value="0">Select Class:</option>
                        <option value="economy">Economy</option>
                        <option value="business">Business</option>
                        <option value="first">First-Class</option>
                    </select>

        </div> -->
    </div>

    <div class="wrap2">
        <main>
            <div class="container">
            <section class="dashboard">
                
        
                <section class="flights">
                
                <section class="flightList">
                    <!-- One article is an entire list item -->
					<?php
						while($row = $result->fetch_assoc()){
					?>
                    <article class="flightCard flightList__item">
                    <div class="flightCard__departure">
                        <!-- DEPATURE TIME -->
                        <time class="flightCard__time"><?php $_SESSION["flight_num"] = $row['FLIGHT_NUM'];echo explode(":00",explode(" ",$_SESSION["depart_time"])[1])[0]; ?></time>
                        <!-- DEPART LOCATION -->
                        <h2 class="flightCard__city"><?php $_SESSION["start_loc"] = $row['START_LOC']; echo getCity($row['START_LOC']); ?></h2>
                        <!-- DEPART DATE -->
                        <time class="flightCard__day"><?php $_SESSION["depart_time"] = $row['DEPART_TIME']; echo explode(" ",$_SESSION["depart_time"])[0] ;   $_SESSION["flight_id"] = $row['FLIGHT_ID'];?></time> 
                    </div>
                    <div class="flightCard__route">
                        <!-- FLIGHT DURATION -->
                        <p class="flightCard__duration"><?php echo date('H:i',(strtotime(explode(":00",explode(" ",$_SESSION["land_time"])[1])[0]) - strtotime(explode(":00",explode(" ",$_SESSION["depart_time"])[1])[0])))?></p>
                        <div class="flightCard__route-line route-line" >
                        <div class="route-line__stop route-line__start" ></div>
                        <div class="route-line__stop route-line__end" ></div>
                        </div>
                        <p class="flightCard__type">Non-stop</p>
                    </div>
                    <div class="flightCard__arrival">
                        <time class="flightCard__time"><?php echo explode(":00",explode(" ",$_SESSION["land_time"])[1])[0] ?></time>
                        <h2 class="flightCard__city"><?php $_SESSION["end_loc"] = $row['END_LOC']; echo getCity($row['END_LOC']); ?></h2>
                        <time class="flightCard__day"><?php $_SESSION["land_time"] = $row['LAND_TIME']; echo explode(" ",$_SESSION["depart_time"])[0]; ?></time>
                    </div>
                    <div class="flightCard__action">
                        <p class="flightCard__price price"><sup>$</sup><?php $_SESSION["price"] = $row['E_PRICE']; echo $row['E_PRICE']; ?><sub>USD</sub></p>
                        
                        <button class="button" method="post" name="info" onclick="location.replace('./Payment.php');">BOOK</button>
                    </div>
                    </article>
						  <?php
						}
					?>
                  
                
                </section>
        
                
        
                </section>
        
                
            
            </section>
            <!-- /.dashboard -->
            </div>
            <!-- /.container -->
        </main>
    </div>
   
    
</body>
</html>