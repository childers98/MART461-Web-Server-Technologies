<?php
//Connect to the database
$servername = "saffron.arvixe.com"; //localhost otherwise
$username = "mart461HCL"; //mart461HCL
$password = "mart461HCL"; //mart461HCL
$dbname = “mart461hcl”; //is this correct?


// Create connection - might need to uncomment stuff in this area
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection - say if there is an error
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"; //https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
/* Attempt to connect to MySQL database */
//$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

/*OTHERWISE USE THIS CODE within the documents*/
// //Connect to the database
// $servername = "saffron.arvixe.com"; //localhost otherwise
// $username = "mart461HCL"; //mart461HCL
// $password = "mart461HCL"; //mart461HCL
// $dbname = “mart461hcl”; //is this correct?
//
// // Create connection - might need to uncomment stuff in this area
// $conn = new mysqli($servername, $username, $password);
//
// // Check connection - say if there is an error
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>
