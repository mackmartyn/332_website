<html>
 <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		 <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
  <title>PHP Test</title>
 </head>
 <body>
      <?php session_start(); ?>
      <?php  if (isset($_SESSION['email'])) : ?>
        <div class="jumbotron text-center" style = "background-image: url(Pics/film_banner.jpg); background-size: 100% 100%;">
          <h1 class="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Hello <?php echo $_SESSION['Fname']; ?></h1>
          <h2 class ="display-4" style = "color:white; font-family: 'Oswald', sans-serif;">Welcome to your Admin Homepage</h2>
		  </div>
     
          <p>Click a task to begin</p>
		  <div class = 'row'>
		  <div class = 'col-md-6'>
          <p class="lead">
            <a class="btn btn-info btn-dark btn-block" href="manage_members_view.php" role="button">Manage members</a>
          </p></div><div class = 'col-md-6'>
          <p class="lead">
            <a class="btn btn-info btn-dark btn-block" href="manage_theatre_complexes.php" role="button">Manage Theatre Complexes</a>
          </p></div></div>
		  <div class = 'row'>
		  <div class = 'col-md-6'>
		   <p class="lead">
            <a class="btn btn-info btn-dark btn-block" href="manage_theatres.php" role="button">Manage Theatres</a>
          </p></div> <div class = 'col-md-6'>
          <p class="lead">
            <a class="btn btn-info btn-dark btn-block" href="manage_showings.php" role="button">Manage showings</a>
          </p></div></div>
		  <div class = 'row'>
		  <div class = 'col-md-6'>
          <p class="lead">
            <a class="btn btn-info btn-dark btn-block" href="add_movie.php" role="button">Add a Movie</a>
          </p></div><div class = 'col-md-6'>
          <p class="lead">
            <a class="btn btn-info btn-dark btn-block" href="analytics.php" role="button">Analytics</a>
          </p></div></div>

			<hr class="my-4">
		
         <p> <a href="logout.php" >Logout</a> </p>
      <?php endif ?>
 </body>
</html>
