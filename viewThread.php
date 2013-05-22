<?php
session_start();
include_once "pdoInclude.php";
$threadNumber = $_GET['threadNumber'];

$_SESSION['postToThread'] = $threadNumber;


//get viewed threads so user can see which threads they have already viewed
$userId = $_SESSION['userId'];
$sql = "SELECT `threadList` FROM `threadsViewedTable` WHERE `userId` = '$userId'";
$preparedStatement = $PDO->prepare($sql);
$preparedStatement->execute();
$viewedThreads = $preparedStatement->fetchColumn();
//$viewedThreads = explode(":", $viewedThreads);
$viewedThreadsArray = explode(":", $viewedThreads);
//get all replies to thread
$sql = "SELECT * FROM `ForumThreads` WHERE `threadId` = '$threadNumber'";
$preparedStatement = $PDO->prepare($sql);
$preparedStatement->execute();
$result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

//set functions as arrays yo
$idArray = array();
$threadIdArray = array();
$contentArray = array();
$permissionArray = array();
$isOPArray = array();
$usernameArray = array();
$titleArray = array();


//put all mysql results into rows. 
foreach($result as $row)
{
	array_push($idArray, $row['id']);
	array_push($threadIdArray, $row['threadId']);
	array_push($contentArray, $row['content']);
	array_push($permissionArray, $row['permission']);
	array_push($isOPArray, $row['isOP']);
	array_push($usernameArray, $row['username']);
	array_push($titleArray, $row['title']);
}

//get title
$title = $titleArray[0];

$title = strtoupper($title);

echo "<h1 class='offset5'>";
echo $title;
echo "</h1>";
$i = 0;
//show all forum replies. 
echo "<table class='table table-hover table-bordered table-condensed span9 offset3'><thead><tr><th>User Name</th><th>Content</th></tr></thead>";

while($i < count($idArray))
{
	echo "<tr><td>";
	echo $usernameArray[$i];	
	echo "<br>";
	echo "Post # ";
	echo $idArray[$i];
	echo "</td><td>";
	echo $contentArray[$i];
	echo "</td></tr>";
	$i++;
}

echo "</table>"; 
$i--;
if(in_array($idArray[$i], $viewedThreadsArray))
{
	//do nothing
}
else
{
	$viewedThreads = $viewedThreads. ":" . $idArray[$i];
	$sql = "UPDATE `threadsViewedTable` SET `threadList` = '$viewedThreads' WHERE `userId` = '$userId'";
	$preparedStatement = $PDO->prepare($sql);
	$preparedStatement->execute();
}
//submit reply
echo '<h1 class="offset5 span3">Reply</h1>
<textarea class="offset5" rows="3" id="replyText" placeholder="Reply Text Goes Here"></textarea>
<br><button class="offset5" id="replyToThread">Reply To Thread</button>';



