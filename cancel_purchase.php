<?php
session_start();
include_once("connect.php");
$conn = connect();
$reservation_id = $_POST['cancel'];
$sql ="UPDATE reservation SET Valid='No' WHERE Ticket_id='$reservation_id' ";
$result = $conn->query($sql);
if (!$result) {
     $_SESSION['ticket_message'] = $conn->error;
 } else {
     $_SESSION['ticket_message'] = "Successfully cancelled purchase no `$reservation_id`.";
 }
  header('location: main.php');
?>
