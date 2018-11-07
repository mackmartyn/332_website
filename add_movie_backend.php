<?php
session_start();
include_once("connect.php");
$conn = connect();

if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
  $title = trim($_POST['title']);
  $f_name = trim($_POST['d_fname']);
  $l_name = trim($_POST['d_lname']);
  $length = trim($_POST['length']);
  $plot = $_POST['plot'];
  $rating = trim($_POST['rating']);
  $start_date = trim($_POST['start_date']);
  $last_date = trim($_POST['last_date']);
  $supplier = $_POST['supplier'];

  $sql = "INSERT INTO movie ";
  $sql .= "(Title, Director_fname, Director_lname, Length, Plot, Rating, Start_date, End_date,  Prod_company) ";
  $sql .= "VALUES('{$title}','{$f_name}','{$l_name}',{$length} ,'{$plot}', '{$rating}', '{$start_date}', '{$last_date}','{$supplier}') ";
  $result = $conn->query($sql);

  if (!$result) {
      $_SESSION['signup_errors'] = $conn->error;
      echo $supplier;
      echo $rating;
      header('location: add_movie.php');
  } else {
      $_SESSION['signup_errors'] = "Successfuly added movie!";
      header('location: add_movie.php');
  }

}else {
  $_SESSION['signup_errors'] = "Title cannot be blank.";
  header('location: add_movie.php');
}

?>
