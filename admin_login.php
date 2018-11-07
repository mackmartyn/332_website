<?php
session_start();
include_once("connect.php");
$conn = connect();


if (isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['password'])  && isset($_POST['password'])) {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $sql = "SELECT * FROM admin WHERE email='$email' and password='$password'";
  $result = $conn->query($sql);
  if ($result) {
     $count = $result->num_rows;
   }
  if($count == 0){
    $_SESSION['admin_errors'] = "Invalid credentials.";
    header('location: admin_login_form.php');
  } else {
      while($person = $result->fetch_assoc()) {
          $_SESSION['email'] = $email;
          $_SESSION['admin_id'] = $person['Account_id'];
		  $_SESSION['Fname'] = $person['Fname'];
    }

  }

  if (isset($_SESSION['email']) && isset($_SESSION['admin_id'])) {
	  
   header('location: admin_index.php');
  }
}else {
  $_SESSION['admin_errors'] = "Fields cannot be blank!";
  header('location: admin_login_form.php');
}

?>
