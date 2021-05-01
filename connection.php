<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "OneWay";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "DELETE FROM CUSTOMERS WHERE CUST_ID = '1';";
$sql .= "INSERT INTO CUSTOMERS (CUST_ID, EMAIL, FNAME, LNAME, PWD)
VALUES ( '1','john@example.com', 'John', 'Doe', 'JD21');";


$sql .= "INSERT INTO CUSTOMERS (CUST_ID, EMAIL, FNAME, LNAME, PWD)
VALUES ( '2','joemama@example.com', 'Joe', 'Mama', 'JM34');";



// if ($conn->query($sql) === TRUE) {
//   echo "\nNew record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

if ($conn -> multi_query($sql)) {
    do {
      // Store first result set
      if ($result = $conn -> store_result()) {
        while ($row = $result -> fetch_row()) {
          printf("%s\n", $row[0]);
        }
       $result -> free_result();
      }
      // if there are more result-sets, the print a divider
      if ($conn -> more_results()) {
        printf("-------------\n");
      }
       //Prepare next result set
    } while ($conn -> next_result());
  }
  

$conn->close();