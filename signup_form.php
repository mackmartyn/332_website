<html>
 <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	 <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
  <title>Sign Up</title>
 </head>
 <body>
  <div class="jumbotron text-center" style = "background-image: url(Pics/film_banner.jpg); background-size: 100% 100%;">
          <h1 class="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Sign Up</h1>
		  </div>
   <?php session_start(); ?>
   <?php  if (isset($_SESSION['signup_errors'])) : ?>
     <div class="alert alert-danger">
     <?php echo $_SESSION['signup_errors']; ?>
     <?php  unset($_SESSION['signup_errors']); ?>
   </div>
   <?php endif ?>
   <form id='signup' action='signup.php' method='post' accept-charset='UTF-8'>
     <fieldset >
       <p>Email:  <input type='text' name='email' id='email'  maxlength="50" /> </p>
       <p>Password: <input type='password' name='password' id='password' maxlength="50" /> </p>
       <p>First Name: <input type='text' name='first_name' id='first_name' maxlength="50" /> </p>
       <p>Last Name: <input type='text' name='last_name' id='last_name' maxlength="50" /> </p>
       <p>Phone: <input type='text' name='phone_num' id='phone_num' maxlength="50" /> </p>
       <p>Street <input type='text' name='street' id='street' maxlength="50" /> </p>
       <p>Street Number <input type='text' name='street_number' id='street_number' maxlength="50" /> </p>
       <p>City <input type='text' name='city' id='city' maxlength="50" /> </p>
       <p>Province<input type='text' name='province' id='province' maxlength="50" /> </p>
       <p>Country <input type='text' name='country' id='country' maxlength="50" /> </p>
       <p>Postal <input type='text' name='postal_code' id='postal_code' maxlength="50" /> </p>
       <p>Credit number <input type='text' name='credit_number' required="" id='credit_number' maxlength="50" /> </p>
       <p>Credit Expiry <input type='date' name='credit_expiry' required="" id='credit_expiry' maxlength="50" /> </p>
       <input type='submit' name='Submit' value='Submit' />
     </fieldset>


   </form>
   <hr class="my-4">
   <p class=text-center><a href="index.php"> Go Back </a></p>

 </body>
</html>
