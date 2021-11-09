<?php require('mysqliconnection.php'); ?>
<?php require('BasicQuery.php'); //want to try to include these so that I am not repeating everything?>
<?php require('updatePaige.php');?>
<?php require('deletePaige.php');?>

<?php
//I need to create a session so that this ends when admin gets off


//Retrieve Data with a select statement
$sql = "SELECT * FROM paige_users"; // ORDER by "firstname" -or whatever- can go at the end of this statement
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "firstname: " . $row["firstname"]. " - lastname: " . $row["lastname"]. " - email: " . $row["email"]. " - hiddenkey: " . $row["hiddenkey"]. " - usersID " . $row["usersID"]. "<br>";
  }
}
else
{
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

//How to do it on the users end?? Instead of updating in here...still don't understand that


$stmt->execute();
echo "New users created successfully";
$stmt->close();


//UPDATE
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


//DELETE(INACTIVATE - would be better aka hitting some kind of update)
//I do not understand exactly how this should be working
 $sql = "DELETE FROM paige_users WHERE userid='" . $_GET["userid"] . "'";

 if (mysqli_query($conn, $sql))
{
     echo "User deleted successfully";
 }
 else
 {
     echo "Error deleting user: " . mysqli_error($conn);
 }
 mysqli_close($conn);



?>

<!-- <form action='updatePaige.php' method='GET'><select name='userID'>
  <?php
// $controlthing = "";
// // if it returns an error of false, check your query
// if ($result->num_rows > 0) {
//   // output data of each row
//
//   while($continueon) {
//     // echo "person: " . $row["userID"] . " " . $row["username"]  . " " . $row["firstname"]  . " " . $row["email"]  . " " . $row["privatekey"] . "<br />";
//     $row = $result->fetch_assoc();
//     if($row == null)
//     {
//       $continueon = false;
//     }
//     else
//     {
//       echo "<option value ='" . $row["userID"] . "' name='" . $row["userID"] . "'>" . $row["username"]  . "</option>";
//
//     }
//   }
// } else {
//   echo "0 results";
// }
?>
</select> input type ='submit' value = 'submit'></form>
<?php
//$conn->close();
?> -->



<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
  <!--  <conn rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Edit Users</h2>
        <?php
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action=""
        <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">-->
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="hiddenkey" name="password" class="form-control <?php
                 echo (!empty($hiddenkey_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $hiddenkey_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Make Changes">
            </div>
        </form>
    </div>
</body>
</html>
