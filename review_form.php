<html>
 <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
  <title>Review</title>
 </head>
 <body>
   <?php session_start(); ?>

    <?php  if (isset($_SESSION['review_errors'])) : ?>
      <div class="alert alert-info">
     <?php echo $_SESSION['review_errors']; ?>
     <?php  unset($_SESSION['review_errors']); ?>
      </div>
   <?php endif ?>
   <h1 class = "jumbotron text-center" style="color:white; font-family: 'Noto Serif', serif; padding-bottom: 50px; background-image: url(Pics/film_banner.jpg); background-size: 100% 100%; font-weight: bold">MOVIE REVIEWS</h1>
   <?php
   include_once("connect.php");
   $conn = connect();
   $sql= "SELECT * FROM movie WHERE 1";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
       echo "<form action='submit_review.php' method='post' accept-charset='UTF-8'>";
       echo "<input name=Movie_id type=hidden value='{$row['Movie_id']}' >";
       echo "<h3 style = 'background-color: rgba(44,66,113,0.9); color:white'>". $row['Title'] ."</h3>";
       echo "<textarea class=form-control rows=2 name=review id=review></textarea>";
       echo "<input type=submit name=Submit value= 'Submit your review' />";
       echo "</form>";
	   echo "<div class = 'container-fluid' style = 'margin-left: 100px'>";
       echo "<h4> See What Others Are Saying </h4>";
       $sql = "SELECT * FROM review WHERE Movie_id='{$row['Movie_id']}' ";
       $reviews = $conn->query($sql);
	   echo "<table class = 'table table-striped'> <thead> <tr> <th>User ID</th><th> User Review</th></tr></thead><tbody>";
        while($row2 = $reviews->fetch_assoc()) {
          echo "<tr><td>User {$row2['Account_id']}</td><td>  {$row2['Review_content']}  </td></tr>";
        }
		echo "</body> </table> </div>";
		echo "<hr class='my-4'>";

     }
   }



   ?>



      <p> <a href="main.php"> Return to Main </a> </p>
 </body>
</html>
