<?php
session_start();
include_once "pdoInclude.php";

$permissionLevel = $_SESSION['permission'];

echo'<center><h1>New Thread</h1>
<textarea rows ="1" id="postTitle" placeholder="Title"></textarea><br>
<textarea rows="3" id="postText" placeholder="Thread Text Goes Here"></textarea>
<br><button id="submitNewThread">submit new Thread</button></center>';
 
$sql = "SELECT * FROM `ForumThreads` WHERE `permission` <= '$permissionLevel'";
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

//array of current threads
$currentThreadsArray = array();

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
$arrayLength = count($idArray);
//$arrayLength--;
$doesMatch = false;
//set number of threads shown. 
$numberOfThreads = 11;
$numberOfThreadsIterator = 0;

while($arrayLength >= 0)
{
	if($numberOfThreadsIterator < $numberOfThreads)
	{
		$doesMatch = false;
		$currentThreadId = $threadIdArray[$arrayLength];
		$i = 0;
		while($i<= count($currentThreadsArray))
		{
			if($currentThreadId == $currentThreadsArray[$i])
			{
				$doesMatch = true;
				$i = count($currentThreadsArray);
			}
			$i++;
		}
		if($doesMatch == false)
		{
			array_push($currentThreadsArray, $currentThreadId);				
			$numberOfThreadsIterator++;	
		}	
		$arrayLength--;
	}
	else
	{
		$arrayLength = 0;
	}
}
$i = count($currentThreadsArray);
$k = 0;
//put out table for different table rows and such. 
echo "<center><table class='table table-hover table-bordered'><thead><tr><th>Thread Id#</th><th>Post Title</th><th>Original Poster</th></tr></thead>";
while($i > 0)
{
	if($k <= $numberOfThreads)
	{
		//gets data from current threads array, subtracts by one to show location due to arrays starting at 0, not one...
		$preprocessedLocation = $currentThreadsArray[$k];
		$preprocessedLocation--;
		echo "<tr id = 'loadMe' href='viewThread.php?threadNumber=";
		echo $threadIdArray[$preprocessedLocation];
		echo "'><td>";
		echo $threadIdArray[$preprocessedLocation];
		echo "</td><td>";
		echo $titleArray[$preprocessedLocation];
		echo "</td><td>";
		echo $usernameArray[$preprocessedLocation];
		echo "</td></tr>";
		$i--;	
		$k++;
	}
	else
	{
		$i = 0;
	}
	
}
echo "</table></center>"; 
?>
<!--
echo $idArray[$i];
	echo $threadIdArray[$i];
	echo $contentArray[$i];
	echo $permissionArray[$i];
	echo $isOPArray[$i];
	echo $usernameArray[$i];
	echo $titleArray[$i];
	echo "<br>";
-->
