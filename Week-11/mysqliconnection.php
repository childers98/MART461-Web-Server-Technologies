<?php

function getDatabase()
{
  $servername = "saffron.arvixe.com"; //server name
  $username = "mart461HCL";
  $password = "mart461HCL";
  $dbname = "mart461hcl";

  // Create connection
  $conn2 = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
  }
  else
  echo ("connection successful");
  return $conn2;
}

$conn2 - getDatabase();

?>
