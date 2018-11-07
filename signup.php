<?php
session_start();
include_once("connect.php");
$conn = connect();

if (isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['password']) && isset($_POST['password'])) {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $phone = trim($_POST['phone_num']);
  $street = trim($_POST['street']);
  $street_number = trim($_POST['street_number']);
  $city = trim($_POST['city']);
  $province = trim($_POST['province']);
  $country = trim($_POST['country']);
  $postal = trim($_POST['postal_code']);
  $credit_number = trim($_POST['credit_number']);
  $credit_expiry = $_POST['credit_expiry'];

  $sql = "INSERT INTO member ";
  $sql .= "(Password, Fname, Lname, Phone_num, Email, Street, Street_num, City, Province, Country, Postal_code, Credit_num, Credit_expiry) ";
  $sql .= "VALUES('{$password}','{$first_name}','{$last_name}','{$phone}' ,'{$email}', '{$street}', '{$street_number}', '{$city}','{$province}','{$country}', '{$postal}','{$credit_number}','{$credit_expiry}') ";
  $result = $conn->query($sql);


  if (!$result) {
      $_SESSION['signup_errors'] = $conn->error;
      header('location: signup_form.php');
  } else {
      $_SESSION['signup_errors'] = "Sign up Successful! Please Log in.";
      header('location: index.php');
  }

}else {
  $_SESSION['signup_errors'] = "Email or password cannot be blank.";
  header('location: signup_form.php');
}

?>
