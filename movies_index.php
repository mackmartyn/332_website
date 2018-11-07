<html>
 <head>
  <title>Theatres</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 </head>
 <body>
   <style>
   .theatre_complex {

     font-size: large;

   }

   .theatre {
     padding-left: 20px;
     text-decoration: underline;
   }

   .movie {
     padding-left: 40px;
   }

   .tix {
     width: 30px;

   }

   .flash {
     background-color: yellow;
     font-size: large;
   }
   </style>

      <?php session_start(); ?>
      <?php  if (isset($_SESSION['ticket_message'])) : ?>
    	   <div class="alert alert-info"><strong ><?php echo $_SESSION['ticket_message']; ?></strong></div>
         <?php unset($_SESSION['ticket_message']); ?>
      <?php endif ?>

      <?php
      include_once("connect.php");
      $conn = connect();
      $sql= "SELECT * FROM theatre_complex WHERE 1";
      $result = $conn->query($sql);
      //theatre complex result
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<div class=theatre_complex>" . $row['Name'] . ", <strong>Address:</strong>  " . $row['Street_num'] . " " .  $row['Street'] . ", " . $row['City'] . ", Ticket prices: $" . $row['Movie_price'] . "</div><br>";
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
                    $movie_id = $showing_row['Movie_id'];
                    $sql = "SELECT * FROM movie WHERE Movie_id=$movie_id";
                    $movies_result = $conn->query($sql);
                    $movie = $movies_result->fetch_assoc();
                    $showing_date = $showing_row['Showing_date'];
                    $start_time = $showing_row['Start_time'];
                    $person_id = $_SESSION['person_id'];
                    $movie_id = $movie['Movie_id'];
                    echo "<form action='buy_tickets.php' method='post' accept-charset='UTF-8'>";
                    echo "<input name=Movie_id type=hidden value='$movie_id'>";
                    echo "<input name=Showing_date type=hidden value='$showing_date'>";
                    echo "<input name=Start_time type=hidden value='$start_time'>";
                    echo "<input name=Theatre_id type=hidden value='$theatre_id'>";
                    echo "<input name=Person_id type=hidden value='$person_id'>";
					echo "<h4 class=theatre>Theatre: " . $theatre_row['Theatre_id'] . ", Capacity: " . $theatre_row['Max_seats'] .", Screen Size: "  . $theatre_row['Screen_size'] . "</h4><br>";
                  //print_r($theatre_row);
                    echo "<ul> <div class=movie>" . $movie['Title'] . ", Starting time: " . $showing_row['Start_time'] . ", <strong>Tickets:</strong> <input placeholder=0 class=tix type=number name=Num_purchased><input class=btn btn-primary btn-sm type=submit value=Buy></div></ul><br>";
                    echo "</form>";
                  }

                }
              }

          }

        }
      } else {
          echo "0 results";
        }

      echo "<div class=my cart><h1>Purchases</h1></div>";
      echo "<div class=row><div class=col-md-8><table cellspacing=5 class=table table-striped><tr><th>Ticket ID</th><th>Number Purchased</th><th>Showing Date</th><th>Start Time </th><th>Theatre No. </th><th> Movie </th><th>Valid</th><th>Action</th></tr>";
      $sql = "SELECT * FROM reservation WHERE Person_id='$person_id' ";
      $reservations = $conn->query($sql);
      while($reservation = $reservations->fetch_assoc()){
        $reservation_id = $reservation['Ticket_id'];
        $movie_id_b = $reservation['movie'];
        $sql = "SELECT * FROM movie WHERE Movie_id='$movie_id_b'";
        $movie_result_b = $conn->query($sql);
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
          if($reservation['Valid'] == 'Yes'){
            echo "<td><input type=submit class=btn btn-danger value=Cancel></td>";
          }
          echo "</tr>";
          echo "</form>";
          echo "</div><div class=col-md-4></div></div>";
        }
      }


    ?>





 </body>
</html>
