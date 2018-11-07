<html>
 <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
  <title>PHP Test</title>
 </head>
 <body>
 <div class="jumbotron text-center" style = "background-image: url(Pics/film_banner.jpg); background-size: 100% 100%;">
          <h1 class="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Analytics</h1>
		  </div>
      <?php session_start();
      include_once("connect.php");
      $conn = connect();
      $sql = "SELECT Title, SUM(Num_purchased) as TotalAmount FROM movie INNER JOIN reservation ON reservation.movie=movie.Movie_id GROUP BY movie.Movie_id ORDER BY TotalAmount DESC LIMIT 1";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<h2>Most Popular Movie </h2>
                  <p> '{$row['Title']}' with '{$row['TotalAmount']}' total ticket sales";

          }
        }
        $sql = "SELECT Name, SUM(Num_purchased) as TotalAmount FROM theatre_complex INNER JOIN theatre ON theatre.Phone_num=theatre_complex.Phone_num  INNER JOIN reservation ON reservation.Theatre_id=theatre.Theatre_id GROUP BY theatre_complex.Name  ORDER BY TotalAmount DESC LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<h2>Best Selling Theatre Complex </h2>
                    <p> '{$row['Name']}' with '{$row['TotalAmount']}' total ticket sales";

            }
          }
        ?>
		<hr class="my-4">
         <p class = 'text-center'> <a href="admin_index.php" >Admin homepage</a> </p>

 </body>
</html>
