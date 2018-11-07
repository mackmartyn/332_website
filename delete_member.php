<?php
session_start();
include_once("connect.php");
$conn = connect();

if (isset($_POST['account_id_for_delete']) && !empty($_POST['account_id_for_delete']))  {
  $sql = "DELETE FROM member WHERE Account_id='{$_POST['account_id_for_delete']}' ";
  $result = $conn->query($sql);
  if($conn->error) {
    $_SESSION['manage_member_errors'] = $conn->error;
    header('location: manage_members_view.php');
  } else {
    $_SESSION['manage_member_errors'] = "Successfully deleted member.";
    header('location: manage_members_view.php');
  }
} else{
  $_SESSION['manage_member_errors'] = "Nope.";
  header('location: manage_members_view.php');
}

?>
