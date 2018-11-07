<html>
 <head>
  <title>Theatres</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">

 </head>
 <body>
  <div class="jumbotron text-center" style = "background-image: url(Pics/film_banner.jpg); background-size: 100% 100%;">
          <h1 class="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Manage Showings</h1>
		  </div>

   <?php session_start(); ?>
   <?php  if (isset($_SESSION['update_errors'])) : ?>
     <div class="alert alert-info">
     <?php echo $_SESSION['update_errors']; ?>
     <?php  unset($_SESSION['update_errors']); ?>
   </div>
   <?php endif ?>


      <?php
      include_once("connect.php");
      $conn = connect();
      $sql= "SELECT * FROM showing  WHERE 1";
      $result = $conn->query($sql);
      $lmao = "";
      $sql= "SELECT * FROM theatre  WHERE 1";
      $result2 = $conn->query($sql);
      $row2 = 0;
	   $today = date("Y-m-d H:i:s");
      //theatre complex result
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
        echo "<form action=update_showing.php method=post><fieldset><legend> Edit</legend>";
        echo "<input type=hidden  name=old_date value='{$row['Showing_date']}' />
        <input type=hidden  name=old_time value='{$row['Start_time']}' />
        <input type=hidden  name=old_theatre value='{$row['Theatre_id']}' />
        <input type=hidden  name=old_movie value='{$row['Movie_id']}' />";

          echo "<p>Showing Date:  <input type=date min=2018-04-02 name=showing_date required='{$lmao}'  value='{$row['Showing_date']}' /></p>
          <p>Start Time:  <input type=time name=time  required='{$lmao}' value='{$row['Start_time']}' /></p>
          <p>Movie:  <input readonly type=number name=movie required='{$lmao}'  value='{$row['Movie_id']}' /></p>
          <p>Theatre: <select name=theatre> ";
          foreach($result2 as $row2) {
            if ($row2['Theatre_id'] == $row['Theatre_id']) {
              echo "<option selected value='{$row2['Theatre_id']}'>" . $row2['Theatre_id'] . "</option>";
            }else{
              echo "<option value='{$row2['Theatre_id']}'>" . $row2['Theatre_id'] . "</option>";
            }
          }
        echo "</select></p><input type=submit name=Submit value=Update /></fieldset></form> ";
        }
      }
      ?>

	  <hr class="my-4">
<p class = 'text-center'><a href="admin_index.php"> Admin Dashboard </a></p>






 </body>
</html>
