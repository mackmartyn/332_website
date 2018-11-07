<?php
session_start();
include_once("connect.php");
$conn = connect();

if (isset($_POST['Phone_num']) && !empty(trim($_POST['Phone_num'])) && !empty(trim($_POST['Name'])) && isset($_POST['Name'])) {
  $name = trim($_POST['Name']);
  $street = trim($_POST['Street']);
  $street_num = trim($_POST['Street_num']);
  $city = trim($_POST['City']);
  $province = trim($_POST['Province']);
  $country  = trim($_POST['Country']);
  $postal = trim($_POST['Postal']);
  $phone_num = trim($_POST['Phone_num']);
  $price = trim($_POST['Price']);

  $sql = "INSERT INTO theatre_complex (Name, Street, Street_num, City, Province, Country, Postal_code, Phone_num, Movie_price)";
  $sql .= "VALUES('{$name}', '{$street}', '{$street_num}','{$city}','{$province}', '{$country}','{$postal}','{$phone_num}', '{$price}');";
  $result = $conn->query($sql);
  if (!$result) {
      $_SESSION['update_errors'] = $conn->error;
      header('location: manage_theatre_complexes.php');
  } else {
    $_SESSION['update_errors'] = "Successfully added theatre complex!";
      header('location: manage_theatre_complexes.php');
  }

}else {
  $_SESSION['update_errors'] = "Cannot be blank!";
  header('location: manage_theatre_complexes.php');
}

?>