<?php
//connect to Database
include_once "config.php"; //OR use require('config.php');

//Retrieve Data with a select statement
$sql = "SELECT firstname, lastname, email, hiddenkey, usersID FROM paige_users"; // ORDER by firstname can go at the end of this statement

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "firstname: " . $row["firstname"]. " - lastname: " . $row["lastname"]. " - email: " . $row["email"]. " - hiddenkey: " . $row["hiddenkey"]. " - user id " . $row["usersID"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

//INSERT
// prepare and bind - Remember to prepare and bind!!!
$stmt = $conn->prepare("INSERT INTO paige_users (firstname, lastname, email, hiddenkey) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email, $hiddenkey);

// set parameters and execute
$firstname = "Helena";
$lastname = "Sydney";
$email = "giantfort@gmial.com";
$hiddenkey = "PrincessDaisy"; //figure out how to hide passwords


$stmt->execute();

echo "New users created successfully";

$stmt->close();

//NEW USER Not created successfully
// $sql = "INSERT INTO paige_users (firstname, lastname, email, hiddenkey) VALUES ('$firstname, $lastname, $email, $hiddenkey')";
//
// if(mysqli_query($conn, $sql))
// {
//   echo "New user added successfully!";
// }
// else {
//   echo "Error: " . $sql . ":-" . mysqli_error($conn);
// }
// mysqli_close($conn);



//UPDATE - https://www.tutsmake.com/select-insert-update-delete-record-using-php-and-mysql/
$sql = "UPDATE paige_users SET firstname = '$firstname', lastname = '$lastname', email = '$email', hiddenkey = '$hiddenkey', WHERE userid = '$usersID'";

$query = mysqli_query($conn,$sql);
if(!$query)
{
    echo "Query does not work.".mysqli_error($conn);die;
}
else
{
    echo "Data successfully updated";
}


//OR - https://stackoverflow.com/questions/19717138/make-a-user-active-inactive-php-mysql
// $sql = "UPDATE  tbl_users SET name='$name', username='$username',password='$password', email='$email', level='$level', isactive='$isactive' WHERE id='$id'";
// $result = mysqli_query($connection, $sql);
// $numRows = mysqli_affected_rows($connection);
// if ($numRows >= 1) {
//     return true;    //user updated
// } else {
//     return false;   //user not updated
// }
// }

//DELETE(INACTIVATE - would be better)
 $sql = "DELETE FROM users WHERE userid='" . $_GET["userid"] . "'";

 if (mysqli_query($conn, $sql))
{

     echo "User deleted successfully";
 }
 else
 {

     echo "Error deleting user: " . mysqli_error($conn);
 }
 mysqli_close($conn);

 //More info on how to go about creating an admin page - https://stackoverflow.com/questions/6102586/how-to-edit-the-user-information-by-admin


//need to create a function
//Connect to mySQL
   // function OpenConnection()
   //  {
   //      try
   //      {
   //          $serverName = "tcp:myserver.database.windows.net,1433";//saffron.arvixe.com:3306
   //          $connectionOptions = array("Database"=>"paige_users",
   //              "Uid"=>"MyUser", "PWD"=>"MyPassword");
   //          $conn = sqlsrv_connect($serverName, $connectionOptions);
   //          if($conn == false)
   //              die(FormatErrors(sqlsrv_errors()));
   //      }
   //      catch(Exception $e)
   //      {
   //          echo("Error!");
   //      }
   //  }
?>

<!DOCTYPE html>
<!--FORM-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <conn rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>hiddenkey</label>
                <input type="hiddenkey" name="password" class="form-control <?php echo (!empty($hiddenkey_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $hiddenkey_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="Childers_Register9.php">Sign up now</a>.</p>
        </form>

      <!--  Make sure to also uncomment the php
       <label>Active : </label>
        <select name="status">
        <option value="Active" <?php// if ($status=="Active" || !isset($status)) echo "selected='selected'"; ?>>Active</option>
        <option value="Inactive" <?php //if ($status=="Inactive") echo "selected='selected'"; ?>>Inactive</option>
      </select> -->



    </div>
</body>
</html>
