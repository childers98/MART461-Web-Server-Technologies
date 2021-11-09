<?php
$servername = "saffron.arvixe.com"; //server name
$username = "mart461HCL";
$password = "mart461HCL";
$dbname = "mart461hcl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
echo ("connection successful");
//changed name to mysqliconnection so I wouldn't have to worry about that being something different
?>
