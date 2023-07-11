<?php
	require_once('shared/global_vars.php');
	require_once('shared/connect.php');
	require_once('functions/functions.php');	
	require_once('controllers/login_controller.php');
	$pageTitle = 'Login';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="TEGN300 Investments">
    <meta name="generator" content="Hugo 0.88.1">
    <title><?php echo $app_name . ' ' . $pageTitle;?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin px-5" style="">
  <form action="" method="POST">
    <img class="" src="assets/img/logo.png" alt="Pillhurb Logo" style="max-width: 100%;">
	<!--<h3 class="text-white">Pillhub Pvt Ltd</h3>-->
    <!--<h1 class="h3 mb-3 fw-normal">Please sign in</h1>-->
	<div class="<?php echo $class;?>"><?php echo $msg;?></div>
	
    <div class="form-floating">
      <input type="text" class="form-control mb-3 form-control-sm" id="floatingInput" placeholder="Username" name="username" autofocus>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control mb-3 form-control-sm" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <button name="login" class="w-100 btn btn-lg btn-outline-light mb-4" type="submit">Sign in</button>
  </form>
</main>
  </body>
</html>
