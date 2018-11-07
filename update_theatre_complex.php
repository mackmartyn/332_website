<?php
session_start();
include_once("connect.php");
$conn = connect();

if (isset($_POST['phone_num']) && !empty(trim($_POST['phone_num'])) && !empty(trim($_POST['name'])) && isset($_POST['name'])) {
  $name = trim($_POST['name']);
  $street = trim($_POST['street']);
  $street_num = trim($_POST['street_num']);
  $city = trim($_POST['city']);
  $province = trim($_POST['province']);
  $country  = trim($_POST['country']);
  $postal = trim($_POST['postal']);
  $phone_num = trim($_POST['phone_num']);
  $price = trim($_POST['price']);

  $sql = "UPDATE theatre_complex ";
  $sql .= "SET Name='{$name}', Street='{$street}', Street_num='{$street_num}', Phone_num='{$phone_num}', City='{$city}', Province='{$province}', Postal_Code='{$postal}', Country='{$country}', Movie_price='{$price}' ";
  $sql .= "WHERE Phone_num={$phone_num} ;";
  $result = $conn->query($sql);
  if (!$result) {
      $_SESSION['update_errors'] = $conn->error;
      header('location: manage_theatre_complexes.php');
  } else {
    $_SESSION['update_errors'] = "Successfully updated theatre complex!";
      header('location: manage_theatre_complexes.php');
  }

}else {
  $_SESSION['update_errors'] = "Cannot be blank!";
  header('location: manage_theatre_complexes.php');
}

?>
