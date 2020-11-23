
<!-- INCLUDE DB -->
<?php include "includes/config.php"; ?>

<!-- INCLUDE FUNCTIONS -->
<?php include "admin/functions.php"; ?>

<?php session_start(); ?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from usman.it/themes/charisma/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2019 11:45:37 GMT -->
<head>

<meta charset="utf-8">
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
<meta name="author" content="Muhammad Usman">

<link id="bs-css" href="/blog/css/bootstrap-cerulean.min.css" rel="stylesheet">
<link href="/blog/css/charisma-app.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/blog/css/font-awesome.css">


<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div class="ch-container">
<div class="row">
<div class="row">
<div class="col-md-12 center login-header">
<h2>Welcome to mania</h2>
</div>

</div>
<div class="row">
<div class="well col-md-5 center login-box">
<div class="alert alert-info">
Please login with your Username and Password.
</div>

<form class="form-horizontal" action="" method="post">
     <?php

          // Declare variables
          if (isset($_POST['login'])) {
            
            $username = escape_string($_POST['username']);
            $password = escape_string($_POST['user_password']);

            $username = escape_string($username);
            $password = escape_string($password);

            $user_query = "SELECT * FROM users WHERE username = '{$username}' ";
            $get_send_query  = query($user_query);
            confirm($get_send_query);

            while ($row = fetch_array($get_send_query)) {
              
              $db_username = $row['username'];
              $db_user_firstname = $row['user_firstname'];
              $db_user_lastname = $row['user_lastname'];
              $db_user_password = $row['user_password'];
              $db_user_role = $row['user_role'];  
            }

            

            if (password_verify($password, $db_user_password)) {
                  // YOU MUST SET SESSION BEFORE GO TO ADMIN
              $_SESSION['username'] = $db_username;
              $_SESSION['firstname'] = $db_user_firstname;
              $_SESSION['lastname'] = $db_user_lastname;
              $_SESSION['user_role'] = $db_user_role;
                
              header("Location: admin/");


            } 

              
             else {
              header("Location: index.php");
            }

          }



          ?>
<fieldset>
<div class="input-group input-group-lg">
<span class="input-group-addon"><i class="fa fa-user red"></i></span>
<input autocomplete="off" type="text" name="username" class="form-control" placeholder="Username">
</div>
<div class="clearfix"></div><br>
<div class="input-group input-group-lg">
<span class="input-group-addon"><i class="fa fa-lock red"></i></span>
<input autocomplete="off" type="password" name="user_password" class="form-control" placeholder="Password">
</div>
<div class="clearfix"></div>
<div class="input-prepend">
<label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
</div>
<div class="clearfix"></div>
<p class="center col-md-5">
<button type="submit" name="login" class="btn btn-primary">Login</button>
</p>
</fieldset>
</form>
</div>

</div>
</div>
</div>


</body>

<!-- Mirrored from usman.it/themes/charisma/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2019 11:45:37 GMT -->
</html>

       

