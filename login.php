<?php

session_start();
include 'header/connect_database.php'; 

if(isset($_GET['logout'])){
	
	if($_GET['logout'] == 'true')
	{	
		session_destroy();
	}
	
	}
	
if($_POST)
	{
	
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT count(*) from user WHERE username=:username AND password =:password";
	$sth = $dbh->prepare($query);
	$sth->bindValue(':username',$username);
	$sth->bindValue(':password',$password);
	$sth->execute();
	$rows = $sth->fetch(PDO::FETCH_NUM);
	
	if($rows[0]==1)
	{
		
		$_SESSION['username'] = $username;
		header("location:index.php");
		
	}
	else
	{
		//$_SESSION['username'] = "fakesession";
		echo "incorrect credentials";
	}
	
	}
	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Wahab Jawed">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Signin - FulFill App</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" method="post" action="login.php">
     <center>   <h3 class="form-signin-heading">FulFill Admin Panel</h3><center>
        <input type="text" id="username"  name="username" class="form-control" placeholder="Username" required autofocus>
        <br>
        <input type="password" id="password"  name="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    
  </body>
</html>
