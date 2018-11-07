<?php
session_start();
include_once("connect.php");
$conn = connect();

if (isset($_POST['Phone_num']) && !empty(trim($_POST['Phone_num']))) {
	$Theatre_id = trim($_POST['Theatre_id']);
	$Max_seats = trim($_POST['Max_seats']);
	$Screen_size = trim($_POST['Screen_size']);
	$Phone_num = trim($_POST['Phone_num']);
	
  $sql = "UPDATE theatre ";
  $sql .= "SET Max_seats='{$Max_seats}', Screen_size='{$Screen_size}' ";
  $sql .= "WHERE Phone_num='{$Phone_num}' AND Theatre_id = '{$Theatre_id}';";
  $result = $conn->query($sql);
  
  if (!$result) {
      $_SESSION['update_errors'] = $conn->error;
      header('location: manage_theatres.php');
  } else {
    $_SESSION['update_errors'] = "Successfully updated theatre!";
      header('location: manage_theatres.php');
  }

}else {
  $_SESSION['update_errors'] = "Cannot be blank!";
  header('location: manage_theatres.php');
}

?>