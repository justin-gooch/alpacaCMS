<?php
include_once "pdoInclude.php";
session_start();

$threadNumber = $_SESSION['postToThread'];
$userPermission = $_SESSION['permission'];
$threadReply = $_GET['submitReply'];
$nickname = $_SESSION['nickname'];

if($threadNumber > 0)
{
	//checks to see if user has permission to view this thread
	$sql = "SELECT * FROM `ForumThreads` WHERE `permission` <= '$userPermission' AND `threadId` = '$threadNumber'";
	$preparedStatement = $PDO->prepare($sql);
    $preparedStatement->execute();
    $numberOfReplies = $preparedStatement->rowCount();
    if($numberOfReplies > 0)
    {
		
		
