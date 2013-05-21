<?php
session_start();
if (isset($_SESSION['logged'])) {
    $session_open = true;
    $user_email = $_SESSION['email'];
    echo "<div id='welcome'>Hello ";
    echo $user_email;
    echo "</div>";
} else {
    $session_open = false;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <script src="https://login.persona.org/include.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link rel="stylesheet" href="persona-buttons.css" />
        <script src="persona.js"></script>
        <script src="script.js"></script>
        <script type="text/javascript">
            <?php if ($session_open) { ?>
                var user_email = '<?php echo $user_email; ?>';
            <?php } else { ?>
                var user_email = null;
            <?php } ?>
        </script>
    <title>My Bootstrap Site</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements 
    			- updated in Bootstrap 2.02 to include the http: -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
  </head>
<body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.html">Secular Students of WCC</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a id ='loadMe' href="index.php">Home</a></li>
		          <li><a href="forum.php" id='loadMe'>Forum</a></li>
              <li><a href="404.html">real pictures of extraterestrials</a></li>              
		        </ul>
		        	<?php if ($session_open) { ?>
		        	
                <button id="logout" class ='persona-button dark pull-right'><span>Logout</span></button>
                
            <?php } else { ?>
                <button id="login" class='persona-button dark pull-right'><span>Login</span></button>
                
            <?php } ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div id='pageDiv'>
