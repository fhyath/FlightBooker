<?php
    include 'connection.php';

    $customerId =$_POST["custID"];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];

    $email = $_POST["email"];
    $password = $_POST["password"];

    console_log("customerId: ", $customerId);
//     $sql = "INSERT INTO CUSTOMERS (CUST_ID, EMAIL, FNAME, LNAME, PWD)
//      VALUES 
//     ( '$customerId' , '$email' ,'$fname, '$lname' , '$password');";

//     if ($conn->query($sql) === TRUE) {
//    printf("\nNew record created successfully");
//        header("Location: ./login.php?signup=success");

// } else {
//     printf("Error ", $sql, "<br>", $conn->error);
// }
    ?>
<body>

    <div class="headerBar">
        <img src="img/logo.png" alt="">
    </div>
    <div class="wrapper">
        <div class="title">
            Signup to create an account!</div>
    <form name= "form" action="signup-submit.php" method="POST">
         <div class="field">
                <input placeholder="Enter an Unique ID" type="text" name="custID" >
            </div>
            <div class="field">
                <input placeholder="First Name" type="text" name="firstname" >
            </div>
              <div class="field">
                <input placeholder="Last Name" type="text" name="lastname" >
            </div>
            <div class="field">
                <input placeholder="Email Address" type="text" name="email" >
            </div>
            <div class="field">
                <input placeholder="Password" type="text" name="password" >
            </div>

            <div class="field">
                <input type="submit" name="loginsubmit" value="Signup">
            </div>
            <div class="signup-link">
               <a href="login.php">Go back to login!</a>
            </div>
        </form>
    </div>
</body>
</html>