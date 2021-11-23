<?php require('mysqliconnection.php'); ?>

<?php
if(isset($_GET["userID"]))
{
  $user_id = $_GET["userID"];
}
$stmt = $conn->prepare("UPDATE paige_users SET username = ? WHERE userID = ?");
$stmt->bind_param("si", $username, $userid);

$username = "hi there";
$userid = $user_id;
$stmt->execute();

echo ("User Updated");
?>

<?php //header("Location: basicquery.php"); ?>
