
<?php
// if($_POST){
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "OneWay";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// if (isset($_POST['submit'])){
//     if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])){
    
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * from CUSTOMERS where EMAIL='$email' and PWD='$password'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['OneWay'] = 'true';
            header("location:flights.php?login=success");
        } else{
            header('location:login.php?login=failed');
        }
// }

    
    

?>


