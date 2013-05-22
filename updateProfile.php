<?php
session_start();
include_once "pdoInclude.php";
//get user nickname through get data... 
$newNickname = $_GET['nickname'];
$userPermission = $_SESSION['permission'];
$userId = $_SESSION['userId'];

if($userPermission <1)
{
	//checks to make sure the nickname doesn't exist. 
	$sql = "SELECT * FROM `members` WHERE `nickname` = '$newNickname'";
	$preparedStatement = $PDO->prepare($sql);
	$preparedStatement->execute();
	$numberOfRows = $preparedStatement->rowCount();
	if($numberOfRows <1)
	{
		$sql = "UPDATE `members` SET `nickname` = '$newNickname', `permission` = '1' WHERE `id` = '$userId'";
		$preparedStatement = $PDO->prepare($sql);
		$preparedStatement->execute();
		echo $sql;
		//add user info to list of viewed threads
		$sql = "INSERT INTO `threadsViewedTable` (userId, threadList) VALUES ('$userId', '0:0')";
		$preparedStatement = $PDO->prepare($sql);
		$preparedStatement->execute();
		echo "<br>" + $sql;
		
		//update user permission with session data
		$_SESSION['permission'] = 1;
		echo $_SESSION['permission'];
		
		
		echo "your nickname has been changed";
	}
	else
	{
		echo "this nickname already exists";
	}
}
else
{
	echo "please contact an administrator to change your nickname again";
}
?>
		

