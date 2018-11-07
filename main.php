
<html>
 <head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
	 <title>PHP Test</title>
 </head>
 <body class = "basic-page">

      <?php session_start(); ?>
      <?php  if (isset($_SESSION['email'])) : ?>
	  
        <div class="jumbotron text-center" style = "background-image: url(Pics/film_banner.jpg); background-size: 100% 100%;">
          <h1 class="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Hello <?php echo $_SESSION['Fname']; ?></h1>
          <h2 class ="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Welcome to Queen's Cinemas</h2>
      <?php endif ?>
		 </div>
		 <div class = "container-fluid">
		 <h1 class = "display-4"><strong>MOVIE LISTINGS</strong></h1>
			
      <?php  if (isset($_SESSION['ticket_message'])) : ?>
    	   <div class="alert alert-info"><strong ><?php echo $_SESSION['ticket_message']; ?></strong></div>
         <?php unset($_SESSION['ticket_message']); ?>
      <?php endif ?>

      <?php
      include_once("connect.php");
      $conn = connect();
      $sql= "SELECT * FROM theatre_complex WHERE 1";
      $result = $conn->query($sql);
	  $person_id = $_SESSION['person_id'];
      //theatre complex result
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<div class=theatre_complex style = 'background-color: rgba(44,66,113,0.9); color:white'><h2>" . $row['Name'] . "<p class = 'small' style = 'color: rgb(196, 204, 209)'>" . $row['Street_num'] . " " .  $row['Street'] . ", " . $row['City'] . ", Ticket prices: $" . $row['Movie_price'] . "</p></h2></div>";
          $primary_key_num = $row['Phone_num'];
          $sql = "SELECT * FROM theatre WHERE Phone_num='$primary_key_num' ";
          $theatre_result = $conn->query($sql);
          if (!$theatre_result) {
              echo $conn->error;
          } else {
              //actual theatre result
              if ($theatre_result->num_rows > 0) {
                while($theatre_row = $theatre_result->fetch_assoc()) {
                  $theatre_id = $theatre_row['Theatre_id'];
                  $sql = "SELECT * FROM showing WHERE Theatre_id=$theatre_id";
                  $showing_result = $conn->query($sql);

                  while($showing_row = $showing_result->fetch_assoc()){
					  $today = date("Y-m-d H:i:s");
					  if($showing_row['Showing_date'] >= $today) {
                    $movie_id = $showing_row['Movie_id'];
                    $sql = "SELECT * FROM movie WHERE Movie_id=$movie_id";
                    $movies_result = $conn->query($sql);
                    $movie = $movies_result->fetch_assoc();
                    $showing_date = $showing_row['Showing_date'];
                    $start_time = $showing_row['Start_time'];
                    
                    $movie_id = $movie['Movie_id'];
                    echo "<form action='buy_tickets.php' method='post' accept-charset='UTF-8'>";
                    echo "<input name=Movie_id type=hidden value='$movie_id'>";
                    echo "<input name=Showing_date type=hidden value='$showing_date'>";
                    echo "<input name=Start_time type=hidden value='$start_time'>";
                    echo "<input name=Theatre_id type=hidden value='$theatre_id'>";
                    echo "<input name=Person_id type=hidden value='$person_id'>";
					echo "<h4 class=theatre>Theatre: " . $theatre_row['Theatre_id'] . ", Capacity: " . $theatre_row['Max_seats'] .", Screen Size: "  . $theatre_row['Screen_size'] . "</h4><br>";
                    //print_r($theatre_row);
                    echo "<ul> <div class=movie><h3 class = 'text-center'>" . $movie['Title'] . "</h3><p class = 'text-center'>Rated: " . $movie['Rating'] . ", Starting time: " . $showing_row['Start_time'] . ", <strong>Tickets:</strong> <input placeholder=0 class=tix min=0 type=number name=Num_purchased><input class=btn btn-primary btn-sm type=submit value=Buy></div></ul><br>";
					echo "<hr class='my-4'>";
                    echo "</form>";
					  }
                  }

                }
              }

          }

        }
      } else {
          echo "0 results";
        }

      echo "<div class=my cart><h1>Purchases</h1></div>";
      echo "<div><table class=table table-striped><tr><th>Ticket ID</th><th>Number Purchased</th><th>Showing Date</th><th>Start Time </th><th>Theatre No. </th><th> Movie </th><th>Valid</th><th>Action</th></tr>";
      $sql = "SELECT * FROM reservation WHERE Person_id='$person_id' ";
      $reservations = $conn->query($sql);
      while($reservation = $reservations->fetch_assoc()){
        $reservation_id = $reservation['Ticket_id'];
        $movie_id_b = $reservation['movie'];
        $sql = "SELECT * FROM movie WHERE Movie_id='$movie_id_b'";
        $movie_result_b = $conn->query($sql);
		$today = date("Y-m-d H:i:s");
        while($movie = $movie_result_b->fetch_assoc()){
          echo "<form action='cancel_purchase.php' method='post' accept-charset='UTF-8'>";
          echo "<input name=cancel type=hidden value='$reservation_id'>";
          echo "<tr>";
          echo "<td>" . $reservation['Ticket_id'] . "</td>";
          echo "<td>" . $reservation['Num_purchased'] . "</td>";
          echo "<td>" . $reservation['Showing_date'] . "</td>";
          echo "<td>" . $reservation['Start_time'] . "</td>";
          echo "<td>" . $reservation['Theatre_id'] . "</td>";
          echo "<td>" . $movie['Title'] . "</td>";
          echo "<td>" . $reservation['Valid'] . "</td>";
          if($reservation['Valid'] == 'Yes' &&  $reservation['Showing_date'] >= $today){
					  
            echo "<td><input type=submit class=btn btn-danger value=Cancel></td>";
          }
          echo "</tr>";
          echo "</form>";
          echo "</div>";
        }
      }
	  echo "</table>";
    ?>
         
        </div>
		<hr class="my-4">
         <p class = "text-center"> <a href="review_form.php">Leave a Review </a></p>
         <p class = "text-center"> <a href="edit_profile_form.php">Edit My Profile</a> </p>
         <p class = "text-center"> <a href="logout.php" >Logout</a> </p>
    
 </body>
</html>
