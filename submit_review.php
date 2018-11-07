<?php
session_start();
include_once("connect.php");
$conn = connect();

if (isset($_POST['review']) && !empty($_POST['review'])) {
  $review = $_POST['review'];
  $movie_id = $_POST['Movie_id'];
  $person_id = $_SESSION['person_id'];


  $sql = "INSERT INTO review ";
  $sql .= "(Account_id, Movie_id, Review_content) ";
  $sql .= "VALUES('{$person_id}','{$movie_id}','{$review}') ";
  $result = $conn->query($sql);

  if (!$result) {
      $_SESSION['review_errors'] = $conn->error;
      header('location: review_form.php');
  } else {
      $_SESSION['review_errors'] = "Successfully added review.";
      header('location: review_form.php');
  }

}else {
  $_SESSION['review_errors'] = "Fields cannot be blank.";
  header('location: review_form.php');
}

?>
