<?php
session_start();
include_once("connect.php");
$conn = connect();


if (isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['password'])  && isset($_POST['password'])) {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $sql = "SELECT * FROM member WHERE email='$email' and password='$password'";
  $result = $conn->query($sql);
  if ($result) {
     $count = $result->num_rows;
   }
  if($count == 0){
    $_SESSION['login_errors'] = "Invalid credentials.";
    header('location: index.php');
  } else {
      while($person = $result->fetch_assoc()) {
          $_SESSION['email'] = $email;
          $_SESSION['person_id'] = $person['Account_id'];
		  $_SESSION['Fname'] = $person['Fname'];
    }

  }

  if (isset($_SESSION['email']) && isset($_SESSION['person_id'])) {
   header('location: main.php');
  }
}else {
  $_SESSION['login_errors'] = "Fields cannot be blank!";
  header('location: index.php');
}

?>
