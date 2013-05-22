<?php
include_once "pdoInclude.php";
session_start();

$threadNumber = $_SESSION['postToThread'];
$userPermission = $_SESSION['permission'];
$threadReply = $_GET['submitReply'];
$nickname = $_SESSION['nickname'];
$userId = $_SESSION['userId'];

if($userPermission > 0)
{

if($threadNumber > 0)
{
	//checks to see if user has permission to view this thread
	$sql = "SELECT * FROM `ForumThreads` WHERE `permission` <= '$userPermission' AND `threadId` = '$threadNumber'";
	$preparedStatement = $PDO->prepare($sql);
    $preparedStatement->execute();
    $numberOfReplies = $preparedStatement->rowCount();
    
    if($numberOfReplies > 0)
    {
		//if user is allowed to view this thread then...
		
		$result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
		$titleArray = array();
		$opArray = array();
		$permissionArray = array();
		foreach($result as $row)
		{
			array_push($titleArray, $row['title']);
			array_push($opArray, $row['op']);
			array_push($permissionArray, $row['permission']);
		}
		$op=$opArray[0];
		$title=$titleArray[0];
		$permission = $permissionArray[0];
		
		 
		$sql = "INSERT INTO `ForumThreads` (`id`, `threadId`, `content`, `permission`, `isOP`, `username`, `userId`, `title`, `op`) VALUES(NULL, '$threadNumber', '$threadReply', '$permission', '0', '$nickname', '$userId', '$title', '$op')";
		$preparedStatement = $PDO->prepare($sql);
		$preparedStatement->execute();
		error_log($sql);
		
		//link back to thread
		$viewThreadLink = "viewThread.php?threadNumber=";
		$viewThreadLink = $viewThreadLink . $threadNumber;
		echo "Post submitted successfully";
		echo "<br><button id='loadMe' href='";
		echo $viewThreadLink;
		echo "'>Return</button>";
	}
	else
	{
		echo "you don't have permission to view this thread";
	}
	
}
else
{
	echo "you don't have permission to view this thread";
}

}
else
{
	echo "you do not have permission to post yet, please change your username <button id='loadMe' href='profile.php'>Here</button>";
}
?>
		
