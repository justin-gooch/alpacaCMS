<?php
require_once 'header.php';
include_once 'pdoInclude.php';

//sql to pull all blog posts for main page
$sql = "SELECT * FROM `blogPost`";
$preparedStatement = $PDO->prepare($sql);
$preparedStatement->execute();
$result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

//declare arrays for blog posts
$idArray = array();
$usernameArray = array();
$titleArray = array();
$textArray = array();
$timestampArray = array();

//puts blog db data into arrays for easy fetching. 
foreach($result as $row)
{
	array_push($idArray, $row['id']);
	array_push($usernameArray, $row['username']);
	array_push($titleArray, $row['title']);
	array_push($textArray, $row['text']);
	array_push($timestampArray, $row['timestamp']);
}

//put arrays in reverse order for easier parsing...
$idArray = array_reverse($idArray);
$usernameArray = array_reverse($usernameArray);
$titleArray = array_reverse($titleArray);
$textArray = array_reverse($textArray);
$timestampArray = array_reverse($timestampArray);
//the rest is presentation... saving now though
?>


    <div class="container">

      <div class="hero-unit">
        <h1>Secular Students of WCC</h1><br>
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
          <p><a class="btn" href="#">Go there &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Next Up: more stuff</h2>
          <p>Coming soon!</p>
        </div>
      </div><!-- end row 1 -->

      <hr>
<?php 
require_once 'footer.php';
?>
