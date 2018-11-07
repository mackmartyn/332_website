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

   <h1 class = "jumbotron text-center" style="color:white; font-family: 'Noto Serif', serif; padding-bottom: 50px; background-image: url(Pics/film_banner.jpg); background-size: 100% 100%; font-weight: bold">Manage Theatre Complexes</h1>

      <?php
      include_once("connect.php");
      $conn = connect();
      $sql= "SELECT * FROM theatre_complex WHERE 1";
      $result = $conn->query($sql);
      $lmao = "";
      //theatre complex result
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {  
        echo "<form action=update_theatre_complex.php method=post><fieldset><legend>Edit Theatre {$row['Name']}</legend>";
          echo "<p>Name:  <input type=text name=name required='{$lmao}' id=name value='{$row['Name']}' /></p>
          <p>Street:  <input type=text name=street id=street required='{$lmao}' value='{$row['Street']}' /></p>
          <p>Street No:  <input type=text name=street_num required='{$lmao}'  value='{$row['Street_num']}' /></p>
          <p> City:  <input type=text name=city required='{$lmao}' value='{$row['City']}' /></p>
          <p>Province:  <input type=text name=province required='{$lmao}' value='{$row['Province']}' /></p>
          <p>Country:  <input type=text name=country required='{$lmao}' id=name value='{$row['Country']}' /></p>
          <p>Postal:  <input type=text name=postal required='{$lmao}' id=name value='{$row['Postal_Code']}' /></p>
          <p>Phone Number:  <input readonly type=text required='{$lmao}' name=phone_num value='{$row['Phone_num']}' /></p>
          <p>Price:  <input type=number min=0 name=price value='{$row['Movie_price']}' /></p>
          <p><input type=submit name=Submit value=Update /></p></fieldset>
          </form>";
		
        }
		echo "<form action=add_theatre_complex.php method=post><fieldset><legend>Add New Theatre Complex</legend>";
          echo "<p>Name:  <input type=text name=Name required='{$lmao}' id=name  /></p>
          <p>Street:  <input type=text name=Street id=street required='{$lmao}' /></p>
          <p>Street No:  <input type=text name=Street_num required='{$lmao}' /></p>
          <p> City:  <input type=text name=City required='{$lmao}' /></p>
          <p>Province:  <input type=text name=Province required='{$lmao}'/></p>
          <p>Country:  <input type=text name=Country required='{$lmao}'/></p>
          <p>Postal:  <input type=text name=Postal required='{$lmao}'  /></p>
          <p>Phone Number:  <input type=text Required='{$lmao}' name=Phone_num maxlength =10/></p>
          <p>Price:  <input type=number min=0 name=Price  /></p>
          <p><input type=submit name=Submit value='Add Theatre Complex' /></p></fieldset>
          </form> ";
		  
		echo "<hr class='my-4'>"; 
		echo " <p class = 'text-center'> <a href='manage_theatres.php'>Manage Theatres</a></p>";
		echo "<p class = 'text-center'> <a href='admin_index.php'>Admin homepage</a></p>"; 
      }




    ?>





 </body>
</html>
