<html>
 <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		 <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
  <title>PHP Test</title>
 </head>
 <body>
      <?php session_start(); ?>
      <?php  if (isset($_SESSION['manage_member_errors'])) : ?>
        <div class="alert alert-danger">
        <?php echo $_SESSION['manage_member_errors']; ?>
        <?php  unset($_SESSION['manage_member_errors']); ?>
      </div>
      <?php endif ?>

	  <div class="jumbotron text-center" style = "background-image: url(Pics/film_banner.jpg); background-size: 100% 100%;">
         <h1 class="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Manage Members</h1>
		</div>
	  
      <div class="container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Member ID </th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include_once("connect.php");
      $conn = connect();
      $sql= "SELECT * FROM member WHERE 1";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()){
        // echo "<input name=cancel type=hidden value='$reservation_id'>";
        echo "<tr>";
        echo "<td>" . $row['Account_id'] . "</td>";
        echo "<td>" . $row['Fname'] . "</td>";
        echo "<td>" . $row['Lname'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo"<form action='delete_member.php' method='post' accept-charset='UTF-8'>";
        echo "<input id=test name=account_id_for_delete type=hidden value='{$row['Account_id']}'>";
        echo "<td><button type=submit class=btn btn-danger btn-block>Delete</button></form><br>";
        echo"<form action=view_purchases.php method=post accept-charset=UTF-8><input id=test name=history type=hidden value='{$row['Account_id']}'><button type=submit class=btn btn-danger btn-block>History</button></form></td>";
        echo "</tr>";
        echo "</form>";
      }


       ?>
      <tr></tr>
    </tbody>
  </table>
  
	<hr class="my-4">
<a href="admin_index.php"> Go Back </a>
</div>



 </body>
</html>
