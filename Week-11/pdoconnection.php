<?php

//$host = 'localhost';
//$db = 'names';
//$user = 'michaelcassens';
//$pass = 'T3st123!!';

$host = "saffron.arvixe.com"; // this is the server name
$user = "mart461HCL";
$pass = "mart461HCL";
$db = "mart461hcl";
$dsn = "mysql:host=$host;dbname=$db";

//$conn=new PDO($dsn, $user, $pass);
$conn=new PDO($dsn, $user, $pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

?>
