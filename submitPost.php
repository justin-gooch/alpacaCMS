<?php 

session_start();
include_once "pdoInclude.php";

$userPermission = $_SESSION['permission'];
$postTitle = $_GET["postTitle"];
$postText = $_GET["postText"];
$userEmail = $_SESSION["email"];
$nickname = $_SESSION['nickname'];
$userId = $_SESSION['userId'];

if($userPermission > 0)
{
//if user logged in
if($_SESSION['logged'] == true)
{
	if($postText != "undefined")
	{
		//get number of rows for thread id purposes
		$sql = "SELECT id FROM ForumThreads ORDER BY id DESC LIMIT 1"; 
		$preparedStatement = $PDO->prepare($sql);
		$preparedStatement->execute();
		//get rowCount from prepared statement and increment after converting array to string. 
		$rowCount = $preparedStatement->fetch();
		$rowCount = $rowCount[0];
		$rowCount++;
		
		
		
		//insert new information into database accordingly
		$sql = "INSERT INTO `ForumThreads` (`id`, `threadId`, `content`, `permission`, `isOP`, `username`, `userId`, `title`, `op`) VALUES(NULL, '$rowCount', '$postText', '0', '1', '$nickname', '$userId', '$postTitle', '$nickname')";
		error_log($sql);
		$preparedStatement = $PDO->prepare($sql);
		$preparedStatement->execute();
		echo "Post submitted successfully";
		echo "<br><button id='loadMe' href='forum.php'>Return</button>";
	}
	else
	{
		error_log("derp");
		echo "nope";
	}
}
else
{
	echo "please log in to post on this forum";
	
}
}
else
{
	echo "you do not have permission to post yet, please change your username <button id='loadMe' href='profile.php'>Here</button>";
}
?>
