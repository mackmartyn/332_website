<head>
 <title>Theatres</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<?php
session_start();
include_once("connect.php");
$conn = connect();

if (isset($_POST['history']) && !empty($_POST['history']))  {
  $sql = "SELECT * FROM reservation WHERE Person_id='{$_POST['history']}' ";
  $result = $conn->query($sql);
  echo"<div class=container>
    <h2 class='text-center'>Purchase History for Member {$_POST['history']}</h2>
		<hr class='my-4'>
    <table class=table table-bordered>
      <thead>
        <tr>
          <th>Ticket ID </th>
          <th>Number Purchased</th>
          <th>Showing Date</th>
          <th>Start Time</th>
          <th>Theatre ID </th>
          <th> Valid </th>
        </tr>
      </thead>";
  while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . $row['Ticket_id'] . "</td>";
    echo "<td>" . $row['Num_purchased'] . "</td>";
    echo "<td>" . $row['Showing_date'] . "</td>";
    echo "<td>" . $row['Start_time'] . "</td>";
    echo "<td>" . $row['Theatre_id'] . "</td>";
    echo "<td>" . $row['Valid'] . "</td>";
    echo "</tr>";
  }
    echo "</table>";
    echo "	<hr class='my-4'>
	<a href=manage_members_view.php> Go Back </a>"; 
}

   else{
  $_SESSION['manage_member_errors'] = "Nope.";
  header('location: manage_members_view.php');
}

?>
