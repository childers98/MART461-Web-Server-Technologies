<?php
// Start the session
//is this retrieving/how is this linked to the login page
session_start();

echo "Your email is" . $email;
echo "Password is " . $_SESSION["hiddenKey"];
echo "Childhood street name " . $_SESSION["securityQuestion"]. ".";
echo "Cookie named '" . $cookie_phone . "' is not set!<br>";


?> 