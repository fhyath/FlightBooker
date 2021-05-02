<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "OneWay";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "insert into CUSTOMERS (FNAME,LNAME,EMAIL,PWD) values ('$fname','$lname','$email','$password')";
        $run = mysqli_query($conn,$query) or die (mysqli_error());
        if($run){
         header("Location:login.php?signup=success");    
        }    
       
    
    else{
         header("Location:signup.php?signup=failedTRYAGAIN");        
        }
    

?>









