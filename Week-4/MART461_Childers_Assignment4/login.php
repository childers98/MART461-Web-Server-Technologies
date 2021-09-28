<?php
    // // This makes sure it's a post action
    // if($_SERVER["REQUEST_METHOD"] == "POST")
    // {
    //     // gets the username from the form by looking at the name attribute
    //     // $username is how variables are created - ($) before the variable name
    //     // not strongly typed
    //     $username = $_POST["username"];
    //     // gets the pwd by looking at the pwd attribute
    //     $pwd = $_POST["pwd"];
    // }

    //$_GET["NameofVariable"]// to get a specific variable from the querystring
    //$_SERVER['QUERY_STRING'] assuming this puts it in the querystring or takes it out

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_GET["email"];
        echo("Your email is: " . $email);
    }

    //make cookie
    $cookie_phone = "phone";
    $cookie_value = "406";
    setcookie($cookie_phone, $cookie_value, time() + (86400 * 30), "/"); //86400 seconds in a day

    //retrieve cookie
    if(!isset($_COOKIE[$cookie_phone]))
    {
        echo "Cookie named '" . $cookie_phone . "' is not set!<br>";
    }
    else
    {
        echo "Cookie '" . $cookie_phone . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_phone];
    }

    //sessions
    session_start();

    $_SESSION["hiddenKey"] = "purple77";
    $_SESSION["securityQuestion"] = "Toe Nail Dr.";

    //retrieve information from session
    echo "Password is " . $_SESSION["hiddenKey"] . ".<br>";
    echo "Childhood street name " . $_SESSION["securityQuestion"]. ".";

    //displays what's in the array?
    //print_r($_SESSION);

    //is this displaying on this page or the login_success page?? My php is being tempramental

 ?>