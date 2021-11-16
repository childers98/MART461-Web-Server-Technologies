<?php require('mysqliconnection.php'); ?>

<?php
//how do I just call this inside of my admin page
if(isset($_GET["userID"]))
{
  $user_id = $_GET["userID"];
}
$stmt = $conn->prepare("DELETE paige_users SET username = ? WHERE userID = ?");
$stmt->bind_param("si", $username, $userid);

$username = "Joelene";
$userid = $user_id;
$stmt->execute();

echo ("User Deleted");
?>

<?php //header("Location: basicquery.php"); ?>
