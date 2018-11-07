<html>
 <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	 <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
 <title>Add Movie</title>
 </head>
 <body>
 <div class="jumbotron text-center" style = "background-image: url(Pics/film_banner.jpg); background-size: 100% 100%;">
          <h1 class="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Add Movie</h1>
		  </div>
   <?php session_start(); ?>

    <?php  if (isset($_SESSION['signup_errors'])) : ?>
      <div class="alert alert-info">
     <?php echo $_SESSION['signup_errors']; ?>
     <?php  unset($_SESSION['signup_errors']); ?>
      </div>
   <?php endif ?>
   <?php
   include_once("connect.php");
   $conn = connect();
   $sql = "SELECT * FROM movie WHERE 1";
   $result = $conn->query($sql);
   echo "<h3> Current Movies: </h3>";
   echo "<ul>";
   $space = "";
   while($row = $result->fetch_assoc()){
     echo "<li><strong>" . $row['Title'] . "</strong>, Directed by: " . $row['Director_fname'] . " "  . $row['Director_lname'] . ", Rated: " . $row['Rating'];
   }
   echo "</ul>";
   echo"<form  action='add_movie_backend.php' method='post' accept-charset='UTF-8'><fieldset ><legend><strong>Add Movie</strong></legend>";
   echo "<p>Title:  <input type=text name=title required='{$space}' id=email  maxlength=50  </p>
         <p>Director First Name: <input type=text name=d_fname maxlength=50 /> </p>
         <p>Director Last Name: <input type='text' name=d_lname' maxlength=50  /> </p>
         <p>Length: <input type='number' name='length' /> </p>
         <p>Plot: <input type='text' name='plot' /> </p>
         <p>Rating: <select name=rating> <option value=G>G</option> <option value=PG>PG</option> <option value=PG13>PG13</option> <option value=14A>14A</option> <option value=18+>18+</option> <option value=R>R</option></select></p>
         <p>Start Date <input type='date' name='start_date'  maxlength=50 /> </p>
         <p>End Date <input type='date' name='end_date'   maxlength=50 /> </p>";
   $sql = "SELECT * FROM supplier WHERE 1";
   $result2 = $conn->query($sql);
   echo "<p>Production Company: <select name=supplier>";
   while($row2 = $result2->fetch_assoc()){
     echo "<option value='{$row2['Company_name']}'>" . $row2['Company_name'] . "</option>";
   }
   echo "</select></p><input type='submit' name='Submit' value='Add Movie' /></form>";
  ?>





	<hr class="my-4">
      <p class = 'text-center'> <a href="admin_index.php"> Admin homepage</a> </p>
 </body>
</html>
