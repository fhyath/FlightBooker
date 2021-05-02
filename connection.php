<?php
include "debug.php";
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
console_log("Connected successfully");

// $sql = "INSERT INTO CUSTOMERS ( EMAIL, FNAME, LNAME, PWD)
// VALUES ( 'joemama@sccs.com', 'cs', 'cscs', 'eer23')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();




console_log("testing");
console_log($sql);

// if ($conn->query($sql) === TRUE) {
//   console.log("\nNew record created successfully");
// } else {
//   console.log("Error: ", $sql, "<br>", $conn->error)
// }

// if ($conn -> multi_query($sql)) {
//     do {
//       // Store first result set
//       if ($result = $conn -> store_result()) {
//         while ($row = $result -> fetch_row()) {
//           printf("%s\n", $row[0]);
//         }
//        $result -> free_result();
//       }
//       // if there are more result-sets, the print a divider
//       if ($conn -> more_results()) {
//         printf("-------------\n");
//       }
//        //Prepare next result set
//     } while ($conn -> next_result());
//   }
  

