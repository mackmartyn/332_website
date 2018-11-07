<!DOCTYPE html>
<html>
 <head>
  <title>Theatres</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
 </head>
 <body>

   <?php session_start(); ?>
   <?php  if (isset($_SESSION['update_errors'])) : ?>
     <div class="alert alert-info">
     <?php echo $_SESSION['update_errors']; ?>
     <?php  unset($_SESSION['update_errors']); ?>
   </div>
   <?php endif ?>

   <h1 class = "jumbotron text-center" style="color:white; font-family: 'Noto Serif', serif; padding-bottom: 50px; background-image: url(Pics/film_banner.jpg); background-size: 100% 100%; font-weight: bold">Manage Theatres</h1>

      <?php
      include_once("connect.php");
	  error_reporting(0);
	  
	  $conn = connect();
      $sql= "SELECT * FROM theatre_complex WHERE 1";
      $result = $conn->query($sql);
      $lmao = "";
      //theatre complex result
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
			  $Phone_num = $row['Phone_num'];
			  $Complex_name = $row['Name'];
      $conn2 = connect();
      $sql2= "SELECT * FROM theatre WHERE Phone_num = $Phone_num";
      $result2 = $conn->query($sql2);
      $lmao2 = "";
      //theatre complex result
	  echo "<div class = 'row container-fluid'><div class = 'col-md-6'>";
	  echo "<h3>Edit Theatres in Theatre {$Complex_name}</h3>";
	  echo "<hr class='my-4'>"; 
      if ($result2->num_rows > 0) {
          while($row = $result2->fetch_assoc()) {  	  
			echo "<form action=update_theatres.php method=post><fieldset>";
			echo "<p><input type=hidden name=Theatre_id required='{$lmao2}' id=name value='{$row['Theatre_id']}' /></p>
			<p>Max seats:  <input type=number min=1 name='Max_seats' required='{$lmao2}'  value='{$row['Max_seats']}' /></p>
			<p>Screen size:  <select name='Screen_size' id ='Screen_size'>
			<option selected value='{$row['Screen_size']}'>{$row['Screen_size']}</option>
			<option value='small'>small</option>
			<option value='medium'>medium</option>
			<option value='large'>large</option</p>
			<p><input type = 'hidden' name=Phone_num  value = '{$Phone_num}' /></p>
			<p><input type=submit name=Submit value='Update Theatre'/></p></fieldset>
			</form> ";

		  }
		}	 
        
		echo "</div>";
		echo "<div class = 'col-md-6'>";
		 echo "<h3>Add Theatres in Theatre {$Complex_name}</h3>";
	  echo "<hr class='my-4'>";
	  $lmao = "";
		echo " <form action='add_theatres.php' method='post' accept-charset='UTF-8'>
     <fieldset >
         <p>Max seats: <input type='number' required='{$lmao}' min=1 name='Max_seats_add' id=name maxlength='50' /> </p>
         <p>Screen size:  <select required=required='{$lmao}' name='Screen_size_add' id ='Screen_size'>
			<option selected value='Small'>Small</option>
			<option value='Medium'>Medium</option>
			<option value='Large'>Large</option</p></p>
		<p><input type=hidden name = 'Phone_num' value ='{$Phone_num}'/></p>
		<p><input type='submit' name='Submit' value='Add Theatre' /></p>
     </fieldset>
   </form>";
   echo "</div></div>";
		  
      }
	  }
	  	echo "<hr class='my-4'>"; 
		echo " <p class = 'text-center'> <a href='manage_theatre_complexes.php'>Manage Theatre Complexes</a></p>";
		echo "<p class = 'text-center'> <a href='admin_index.php'>Admin homepage</a></p>"; 




    ?>





 </body>
</html>
