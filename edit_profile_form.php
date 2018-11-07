<html>
 <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	 <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
 <title>Sign Up</title>
 </head>
 <body>
 
  <div class="jumbotron text-center" style = "background-image: url(Pics/film_banner.jpg); background-size: 100% 100%;">
          <h1 class="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Edit Profile</h1>
		  </div>
   <?php session_start(); ?>

    <?php  if (isset($_SESSION['update_errors'])) : ?>
      <div class="alert alert-info">
     <?php echo $_SESSION['update_errors']; ?>
     <?php  unset($_SESSION['update_errors']); ?>
      </div>
   <?php endif ?>

   <form  action='edit_profile.php' method='post' accept-charset='UTF-8'>
     <fieldset >
       <?php
       include_once("connect.php");
       $conn = connect();
       $p_id = $_SESSION['person_id'];
       $sql = "SELECT * FROM member WHERE Account_id='$p_id'";
       $result = $conn->query($sql);
	   $space = "";
       while($row = $result->fetch_assoc()){
         echo "<p>Email:  <input type=text name=email id=email  maxlength=50 value='{$row['Email']}' /> </p>
         <p>Password: <input type=password name=password id=password value='{$row['Password']}' maxlength=50 /> </p>
         <p>First Name: <input type='text' name='first_name' id='first_name' maxlength=50 value='{$row['Fname']}' /> </p>
         <p>Last Name: <input type='text' name='last_name' id='last_name' maxlength=50 value='{$row['Lname']}' /> </p>
         <p>Phone: <input type='text' name='phone_num' id='phone_num' value='{$row['Phone_num']}' maxlength=50 /> </p>
         <p>Street <input type='text' name='street' id='street' value='{$row['Street']}' maxlength=50 /> </p>
         <p>Street Number <input type='text' name='street_number' id='street_number' value='{$row['Street_num']}' maxlength=50 /> </p>
         <p>City <input type='text' name='city' id='city' maxlength=50  value='{$row['City']}'  /> </p>
         <p>Province<input type='text' name='province' id='province' maxlength=50  value='{$row['Province']}' /> </p>
         <p>Country <input type='text' name='country' id='country' maxlength=50  value='{$row['Country']}' /> </p>
         <p>Postal <input type='text' name='postal_code' id='postal_code' maxlength=50  value='{$row['Postal_code']}' /> </p>
         <p>Credit number <input type='text' name='credit_number' required='{$space}' id='credit_number' maxlength=50 value='{$row['Credit_num']}' /> </p>
         <p>Credit Expiry <input type='date' name='credit_expiry' required='{$space}' id='credit_expiry' maxlength=50 value='{$row['Credit_expiry']}' /> </p>
         <input type='submit' name='Submit' value='Update Info' />";
       }
        ?>
     </fieldset>
   </form>
   <hr class="my-4">

      <p class='text-center'> <a href="main.php"> Return to Main </a> </p>
 </body>
</html>
