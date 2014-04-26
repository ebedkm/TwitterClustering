<?php
	require_once('TwitterCommunityFinder.php');
  $TCF = new TwitterCommunityFinder();
  
	if(!$TCF->isConnect()){
		header('location: login.php');
	}
  $connection = $_SESSION['connection'];
  if(!isset($_SESSION['account'])) $_SESSION['account'] = $connection->get('account/verify_credentials');

  $user = $TCF->getFriends();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        <h3 class="text-muted">Twitter Community Finder</h3>
      </div>

      <div class="jumbotron">
        <h1>Home</h1>
        <p>Hello, <?php echo $user->screen_name; ?> </p>
      </div>

      <div class="jumbotron">
        <h1>Friend(<?php echo count(get_object_vars($user->friend)); ?>): </h1>
        <p><?php 
          foreach ($user->friend as $key => $value) {
            echo "[$key] = $value <br>";
          }

        ?></p>
      </div>


      <div class="footer">
        <p>&copy; Ebed 22104897</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
