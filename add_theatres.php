<?php
session_start();
include_once("connect.php");
$conn = connect();

if (isset($_POST['Phone_num']) && !empty(trim($_POST['Phone_num'])) ) {
  $Max_seats = trim($_POST['Max_seats_add']);
  $Screen_size = trim($_POST['Screen_size_add']);
  $Phone_num = trim($_POST['Phone_num']);

  $sql = "INSERT INTO theatre (Max_seats, Screen_size, Phone_num)";
  $sql .= "VALUES ('{$Max_seats}', '{$Screen_size}', '{$Phone_num}' );";
  $result = $conn->query($sql);
  if (!$result) {
      $_SESSION['update_errors'] = $conn->error;
      header('location: manage_theatres.php');
  } else {
    $_SESSION['update_errors'] = "Successfully added theatre!";
      header('location: manage_theatres.php');
  }

}else {
  $_SESSION['update_errors'] = "Cannot be blank!";
  header('location: manage_theatres.php');
}

?>