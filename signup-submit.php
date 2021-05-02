

<!-- <!DOCTYPE html>
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


    <body> -->
      <?php
      
    include_once 'connection.php';
    
    $customerId= $_POST["custID"];
    $fname =  $_POST["firstname"];
    $lname = $_POST["lastname"];

	$email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO CUSTOMERS (CUST_ID, EMAIL, FNAME, LNAME, PWD)
     VALUES 
    ( '$customerId' , '$email' ,'$fname, '$lname' , '$password');";
    mysqli_query($conn,$sql);

    if ($conn->query($sql) === TRUE) {
   printf("\n New record created successfully");
       header("Location: ./login.php?signup=success");

} else {     
    printf("Error ", $sql, "<br>", $conn->error);
};