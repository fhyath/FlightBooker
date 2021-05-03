
<?php
// if($_POST){
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OneWay";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// if (isset($_POST['submit'])){
//     if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])){
    
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * from CUSTOMERS where EMAIL='$email' and PWD='$password'";
        $result = mysqli_query($conn,$query);
        $_SESSION['OneWay'] = 'false';
        if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['OneWay'] = 'true';
            $_SESSION['user'] = $email;

            header('location:flights.php?login=success');
        } else{
            $_SESSION['OneWay'] = false;
            header('location:login.php?login=failed');
        }
// }

    
    

?>


