<html>
 <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Oswald|Noto+Serif" rel="stylesheet">
  <title>PHP Test</title>
 </head>
 <body>
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h2 class="modal-title; text-center" id="myModalLabel" style = "font-family: 'Noto Serif', serif">Admin Login</h2>
          </div>
          <div class="modal-body">
             <?php session_start(); ?>
             <?php  if (isset($_SESSION['admin_errors']))  : ?>
            <div class="alert alert-danger">
              <?php echo $_SESSION['admin_errors']; ?>
              <?php  unset($_SESSION['admin_errors']); ?>
            </div>
              <?php endif ?>


              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="login" method="POST" action="admin_login.php">
                              <div class="form-group">
                                  <label for="username" class="control-label">Email</label>
                                  <input type="text" class="form-control" name="email" value="" required="" title="Please enter your email" placeholder="example@gmail.com">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>

                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                <a href="index.php"> Go back </a>



                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">

                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Manage members</li>
                          <li><span class="fa fa-check text-success"></span> Manage theatres</li>
                          <li><span class="fa fa-check text-success"></span> Manage movies and showings</li>
                          <li><span class="fa fa-check text-success"></span> Make sense of your data</li>
                      </ul>

                  </div>
              </div>
          </div>
      </div>
  </div>
   <!-- <form id='login' action='login.php' method='post' accept-charset='UTF-8'>
     <fieldset >
       <legend>Login to OMTS</legend>
       <input type='hidden'  name='submitted' id='submitted' value='1'/>
       <label for='email' >Email</label>
       <input type='text' name='email' id='email'  maxlength="50" />
       <label for='password' >Password</label>
       <input type='password' name='password' id='password' maxlength="50" />
       <input type='submit' name='Submit' value='Submit' />
     </fieldset>

   </form>
   <p> Don't have an account? <a href ="signup_form.php"> Sign up here </a> </p> -->

 </body>
</html>
