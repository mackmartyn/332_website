<?php
session_start();
include_once("connect.php");
$conn = connect();
if($_POST['Num_purchased'] > 0) {
  $num_purchased = $_POST['Num_purchased'];
  $showing_date = $_POST['Showing_date'];
  $start_time = $_POST['Start_time'];
  $theatre_id = $_POST['Theatre_id'];
  $person_id = $_POST['Person_id'];
  $movie_id = $_POST['Movie_id'];

  $sql = "INSERT INTO reservation";
  $sql .="(Num_purchased, Showing_date, Start_time, Theatre_id, Person_id, movie, Valid)";
  $sql .="VALUES({$num_purchased}, '{$showing_date}', '{$start_time}', {$theatre_id}, {$person_id}, {$movie_id}, 'Yes')";
  $result = $conn->query($sql);
  if (!$result) {
       $_SESSION['ticket_message'] = $conn->error;
   } else {
       $_SESSION['ticket_message'] = "Successfully added '$num_purchased' tickets to your cart.";
   }
    header('location: main.php');


}
else {
  $_SESSION['ticket_message'] = "You can't buy 0 tickets lol";
  header('location: main.php');
}



?>
