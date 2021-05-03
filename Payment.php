<?php session_start();
?>
<!DOCTYPE html>
<?php
include 'debug.php';
console_log($_SESSION["class"]);
$localhost = "localhost";
$username = "root";
$password = "root";
$dbname = "oneway";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.5.8/cleave.min.js"></script>
    <title>Payment Details</title>  
</head>
<body class="paymentBody">
    <div class="headerBar">
        <img src="img/logo.png" alt="">
        <a href="./Profile.php">
          <img src="img/user.png" class="user" alt="">
        </a>
    </div>
    
      <div class="paymentHeader">
          <p>Review & Pay</p> 
      </div>  
      <div class="flightDepart">
        <p class="depart">Depart</p>
        <p class="destination"><?= $_SESSION["start_loc"]?> to <?= $_SESSION["end_loc"]?></p>
        <p class="date"><?= $_SESSION["depart_time"]?></p>
      </div>
      <table>
        <!-- <caption>Statement Summary</caption> -->
        <thead>
          <tr>
            <th scope="col">Flight</th>
            <th scope="col">Depart</th>
            <th scope="col">Land</th>
            <th scope="col">Amount</th>
            <th scope="col">Class</th>
            <th scope="col">Travel Time</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-label="Account"><?= $_SESSION["flight_num"]?></td>
            <td data-label="Due Date"><?= $_SESSION["depart_time"]?></td>
            <td data-label="Due Date"><?= $_SESSION["land_time"]?></td>
            <td data-label="Amount">$<?= $_SESSION["price"]?></td>
            <td data-label="Amount"><?= $_SESSION["class"]?></td>
            <td data-label="Period"><?php echo date('H:i',(strtotime(explode(":00",explode(" ",$_SESSION["land_time"])[1])[0]) - strtotime(explode(":00",explode(" ",$_SESSION["depart_time"])[1])[0])))?></td>
          </tr>
          
        </tbody>
      </table>
      <div class="contain">
        <div id="Checkout" class="inline">
            <h1>Passenger Information</h1>
         
            <form>

                <br>
                <div class="formGroup">
                    <label >Full Name</label> <br>
                    <input id="name" class="form-control" type="text" maxlength="255"></input>
                </div>
                <div class="formGroup">
                    <label >Billing Address</label> <br>
                    <input  class=" form-control" type="text"></input>
                </div>
                <label>Phone Number</label>
                    <div class="input-container" >
                        <input id="SecurityCode" class="form-control" type="tel" ></input>
                    </div>
                    
                <br>
                
            </form>
        </div>

      <div class="contain">
        <div id="Checkout" class="inline">
            <h1>Pay Invoice</h1>
            <div class="card-row">
                <span class = "card" id="visa"></span>
                <span  class = "card" id="mastercard"></span>
                <span  class = "card" id="amex"></span>
                <span  class = "card" id="discover"></span>
            </div>
            <form action="Reciept.php" method = "post">
                <div class="formGroup">
                    <label >Payment amount</label>
                    <div class="amount-placeholder">
                        <span>$</span>
                        <span><?= $_SESSION["price"]?></span>
                    </div>
                </div>
                <div class="formGroup">
                    <label >Name on card</label> <br>
                    <input id="name" class="form-control" type="text" maxlength="255"></input>
                </div>
                <div class="formGroup">
                    <label for="CreditCardNumber">Card number</label> <br>
                    <input id="CreditCardNumber" class=" form-control" type="text"></input>
                </div>
                <div class="expiry-date-group formGroup">
                    <label for="ExpiryDate">Expiry date</label>
                    <input id="ExpiryDate" class="form-control" type="text" placeholder="MM / YY" maxlength="5"></input>
                </div>
                <div class="security-code-group formGroup">
                    <label>Security code</label>
                    <div class="input-container" >
                        <input id="SecurityCode" class="form-control" type="password" ></input>
                    </div>
                    
                </div>
                <label>Discount Code</label>
                    <div class="input-container" >
                        <input id="SecurityCode" class="form-control" type="text" ></input>
                    </div>

                <a href="Reciept.php">
                    <button id="PayButton" name = "submit1" type="submit" class="button" onclick="location.replace('./Reciept.php'); console.log('Clicked');">
                        <span class="submit-button-lock"></span>
                        <span class="align-middle" >Pay $<?= $_SESSION["price"]?></span>
                    </button>
                </a>
                
            </form>
        </div>
      </div>
      
      <script>
      var cleave = new Cleave('#CreditCardNumber', {
              creditCard: true,
              onCreditCardTypeChanged: function (type) {
                  console.log(type);
                if(type == "visa"){
                    document.getElementById("visa").style.opacity = 1;
                    document.getElementById("visa").style.transform = "scale(1.22)";
                    
                }
                else if(type == "mastercard"){
                    document.getElementById("mastercard").style.opacity = 1;
                    document.getElementById("visa").style.transform = "scale(1.22)";

                }
                else if(type == "amex"){
                    document.getElementById("amex").style.opacity = 1;
                    document.getElementById("visa").style.transform = "scale(1.22)";
                    
                }
                else if(type == "discover"){
                    document.getElementById("discover").style.opacity = 1;
                    document.getElementById("visa").style.transform = "scale(1.22)";
                    
                }
                else {
                    setOpacity(".card")
                }
     }
  });
    function setOpacity(className) {
        document.querySelectorAll(className).forEach(el => el.style.opacity = 0.2);
    }
   
      </script>
           
    
</body>
</html>
