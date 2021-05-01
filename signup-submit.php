<?php
// Start the session
// session_start();

include 'connection.php';

$customerId=$_POST["custID"];
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];

$email = $_POST["email"];
$password = $_POST["password"];

// console_log($customerId);
$sql = "DELETE FROM CUSTOMERS WHERE CUST_ID = '1';";
$sql = "INSERT INTO CUSTOMERS (CUST_ID, EMAIL, FNAME, LNAME, PWD)
    VALUES ('$customerId' , '$email' ,'$fname, '$lname' , '$password')";

console_log($sql);
    if ($conn->query($sql) === TRUE) {
       console_log("\nNew record created successfully");
       header("Location: ./login.php?signup=success");

} else {
    console_log("Error: ");
    console_log($conn->error);
    // "<br>", $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa&family=Press+Start+2P&family=Quantico&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login.css" />

    <title>One-Way</title>
    </head>


    <body>
      <?php
  
    
    $name = $_POST["name"];
	$email = $_POST["email"];
    $password = $_POST["password"];
    $contents = "$email,$password,$name\n";
	# adding the long string containing users information to the end of the file
	file_put_contents("username.txt", $contents, FILE_APPEND);
    $_SESSION["name"] = $name;
    $_SESSION["corrects"] =0;
    
    // extract($_REQUEST);
    // $file=fopen("username.txt","a");
    // // fwrite($file,"Name : ");
    // fwrite($file, $name .",");
    // // fwrite($file," Email : ");
    // fwrite($file, $email .",");
    // // fwrite($file," Password : ");
    // fwrite($file, $password .".\n");
    // fclose($file);
 ?>
       <div class="headerBar">
        <img src="img/logo.png" alt="">
    </div>
       <div class="wrapper">
        <div class="title2">
            Thank you for signing up!</div>
        <form action="#">
           
            <div class="signup-link">
                <h5><a href="login.php">Please Log In To Fly</a></h5>
        </form>
    </div>
  

    
   
</body>


</html>