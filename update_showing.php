<?php
session_start();
include_once("connect.php");
$conn = connect();


  $old_date = trim($_POST['old_date']);
  $old_time = trim($_POST['old_time']);
  $old_theater = trim($_POST['old_theatre']);
  $old_movie = trim($_POST['old_movie']);
  $showing_date = trim($_POST['showing_date']);
  $start_time  = trim($_POST['time']);
  $theatre = trim($_POST['theatre']);


  $sql = "UPDATE showing ";
  $sql .= "SET Showing_date='{$showing_date}', Start_time='{$start_time}', Theatre_id='{$theatre}' ";
  $sql .= "WHERE Movie_id={$old_movie} AND Showing_date='{$old_date}' AND Start_time='{$old_time}' AND Theatre_id='{$old_theater}' ;";
  $result = $conn->query($sql);
  if (!$result) {
      $_SESSION['update_errors'] = "Cannot update a showing with already purchased reservations! Bad customer experience!!!";
      header('location: manage_showings.php');
  } else {
    $_SESSION['update_errors'] = "Successfully updated showing!";
      header('location: manage_showings.php');
  }



?>
