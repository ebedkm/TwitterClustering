<?php
  require_once('TwitterCommunityFinder.php');
  $TCF = new TwitterCommunityFinder;
  $redirect_url = $TCF->getLoginURL();
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
          
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="#">Login</a></li>
        </ul>
        <h3 class="text-muted">Twitter Community Finder</h3>
      </div>

      <div class="jumbotron">
        <h1>Login</h1>
        <p class="lead">To use this application, you must signed in through your Twitter account</p>
        <p><a class="btn btn-lg btn-success" href="<?php echo $redirect_url; ?>" role="button">Sign in with Twitter</a></p>
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