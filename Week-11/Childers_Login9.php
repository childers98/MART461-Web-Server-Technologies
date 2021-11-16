<?php
//Coding help - https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
//looking for more info for final project
//start a session here to be ended later
session_start();//this "guest user" session should end once the user is logged in
require('mysqliconnection.php')//include_once "config.php";
require('pdoconnection.php');

/*Great to use later*/
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: Childers_Home.php");
//     exit;
// }

// Define variables and initialize with empty values
$email = $hiddenkey = "";
$email_err = $hiddenkey_err = $login_err = ""; //do I need to create an error variable or can I just use the normal variable

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if email or password is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    //do the same for the password
    if(empty(trim($_POST["hiddenkey"]))){
        $hiddenkey_err = "Please enter your password.";
    } else{
        $hiddenkey = trim($_POST["hiddenkey"]);
    }


    // Validate credentials
    //good to use for my store/saving into shopping cart
    if(empty($email_err) && empty($hiddenkey_err)){
        // Prepare a select statement
        //$sql = "SELECT usersID, email, hiddenkey, firstname, lastname FROM paige_users WHERE email = ?";
        $sql = "CALL spSelect_Paige(?)" //Hmm do I need to change this/make a different statement for the Register.php

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        //$stmt->bindParam(2, $usersID, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if($stmt = mysqli_prepare($conn2, $sql)){
            // Bind variables as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Does email exist? If yes verify hiddenkey
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_hiddenkey);
                    if(mysqli_stmt_fetch($stmt)){
                        if(hiddenkey_verify($hiddenkey, $hashed_hiddenkey)){
                            // if password is correct open a new session
                            session_start();
                          /*Important for keeping sessions OPEN*/
                            // Store data in session variables
                            //don't store password
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to Home
                            header("location: Childers_Home.php");
                        }
                        else
                        {
                            // display error message
                            $login_err = "Invalid email or hiddenkey.";
                        }
                    }
                } else
                {
                    $login_err = "Invalid email or hiddenkey.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn2);
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!--<conn rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>
        <!-- not quite sure I understand what they are doing here it looks like they are calling somethings-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>hiddenkey</label>
                <input type="hiddenkey" name="password" class="form-control <?php
                 echo (!empty($hiddenkey_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $hiddenkey_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="Childers_Register9.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>
