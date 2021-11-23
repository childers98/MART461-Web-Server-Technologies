<?php
//Coding help - https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
//also experimenting for final project...
//could add first and last name to this
// add config.php file
require('mysqliconnection.php');//include_once "config.php";
require('pdoconnection.php');

// Define variables and initialize with empty values
$email = $hiddenkey = $confirm_hiddenkey = "";
$email_err = $hiddenkey_err = $confirm_hiddenkey_err = ""; //used for catching errors, why do I want a seperate variable though?

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
        //This would be great to add for username! and also password
    //} elseif(!preg_match('/^[a-zA-Z0-9_@-]+$/', trim($_POST["email"]))){
    //    $email_err = "Email can only contain letters, numbers, periods, and underscores.";
    }
    else
    {
        // Prepare a select statement - this one might need to be changed...
        //$sql = "SELECT usersID FROM paige_users WHERE email = ?"; //was it usersID or userID
        $sql = "CALL spSelect_Paige(?)"; //One or two variables? - should I change this one? or leave it like it was above or not include it at all???
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        //$stmt->bindParam(1, $user_name, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);//PDO prevents some mySQL injection attacks

        if($stmt = mysqli_prepare($conn2, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST["email"]);// Set parameters

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Hmm...Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate hiddenkey
    if(empty(trim($_POST["hiddenkey"]))){
        $hiddenkey_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["hiddenkey"])) < 8){ //elseif makes it required to have a certain number of characters for the password
        $hiddenkey_err = "Password must have at least 8 characters.";//needs to correspond to the number above
    } else{
        $hiddenkey = trim($_POST["hiddenkey"]);
        //$hashed_hiddenkey = password_hash($hiddenkey, hiddenkey_DEFAULT);
    }

    // Validate confirm hiddenkey
    if(empty(trim($_POST["confirm_hiddenkey"]))){
        $confirm_hiddenkey_err = "Please confirm password.";
    } else{
        $confirm_hiddenkey = trim($_POST["confirm_hiddenkey"]);
        if(empty($hiddenkey_err) && ($hiddenkey != $confirm_hiddenkey)){
            $confirm_hiddenkey_err = "Passwords did not match.";
        }
    }

    //Good catching point for required fields
    // Check for errors here
    if(empty($email_err) && empty($hiddenkey_err) && empty($confirm_hiddenkey_err)){

        // Prepare an insert statement
        //$sql = "INSERT INTO users (email, hiddenkey) VALUES (?, ?)";
        // $sql = "CALL spInsert_Paige (email, hiddenkey) VALUES (?,?)"; //needs variables so that these are the only things inserted for login but is this OK?

        if($stmt = mysqli_prepare($conn2, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_hiddenkey);

            // Set parameters
            $param_email = $email;
            $param_hiddenkey = hiddenkey_hash($hiddenkey, hiddenkey_DEFAULT); // This makes the password that the user created into an encrypted 

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: Childers_Login9.php");
            } else{
                echo "Hmm... Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn2);
}
?>

//HTML Document
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

    <!--<conn rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Register</h2>
        <p>Create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="hiddenkey" name="hiddenkey" class="form-control <?php echo (!empty($hiddenkey_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $hiddenkey; ?>">
                <span class="invalid-feedback"><?php echo $hiddenkey_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="hiddenkey" name="confirm_hiddenkey" class="form-control <?php echo (!empty($confirm_hiddenkey_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_hiddenkey; ?>">
                <span class="invalid-feedback"><?php echo $confirm_hiddenkey_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="Childers_Login9.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
