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
  $p_id = $_SESSION['person_id'];

  $sql = "UPDATE member ";
  $sql .= "SET Password='{$password}', Fname='{$first_name}', Lname='{$last_name}', Phone_num='{$phone}', Email='{$email}', Street='{$street}', Street_num='{$street_number}', City= '{$city}', Province='{$province}', Country='{$country}', Postal_code='{$postal}', Credit_num=  '{$credit_number}', Credit_expiry='{$credit_expiry}' ";
  $sql .= "WHERE Account_id=$p_id";
  $result = $conn->query($sql);

  if (!$result) {
      $_SESSION['update_errors'] = $conn->error;
      header('location: edit_profile_form.php');
  } else {
    $_SESSION['update_errors'] = "Successfully updated your profile!";
	$_SESSION['Fname'] = $first_name;
      header('location: edit_profile_form.php');
  }

}else {
  $_SESSION['update_errors'] = "Password and/or Email cannot be blank!";
  header('location: edit_profile_form.php');
}

?>
