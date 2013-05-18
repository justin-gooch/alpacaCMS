<?php
session_start();
if (isset($_SESSION['logged'])) {
    $session_open = true;
    $user_email = $_SESSION['email'];
    echo "Hello ";
    echo $user_email;
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
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
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
              <li class="active"><a href="index.html">Home</a></li>
		          <li><a href="404.html">proof of the existence of god</a></li>
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

    <div class="container">

      <div class="hero-unit">
        <h1>Secular Students of Wcc</h1>
        <p>we be like this, because we are, nothing more. <a href="#">yadayada</a>.</p>
        <p>yadayadayada<a href="#">Read more here</a>.</p>
      </div>

      <div class="row">
        <div class="span4">
          <h2>test part 1</h2>
           <p>button link</p>
          <p><a class="btn" href="#">Go there &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Navbar Examples</h2>
           <p>Suggestions and code for three ways to setup your navbar:</p>
           	<ul>
           		<li>fixed-top</li>
           		<li>static full-width</li>
           		<li>static inside container</li>
           	</ul>
          <p><a class="btn" href="navbar-examples.html">Go there &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Next Up: more stuff</h2>
          <p>Coming soon!</p>
        </div>
      </div><!-- end row 1 -->

      <hr>


      <footer>
        <p>By Justin Gooch <a href="http://justin-gooch.com">Justin-Gooch.com</a></p>
      </footer>
