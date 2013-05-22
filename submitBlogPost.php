<?php
session_start();
include_once "pdoInclude.php";

$userPermission = $_SESSION['permission'];
$blogTitle = $_GET['blogTitle'];
$blogText = $_GET['blogText'];
$nickname = $_SESSION['nickname'];
$timestamp = date("d/m/y : H:i:s", time());

if($userPermission > 3)
{
	$sql = "INSERT INTO `blogPost` (id, username, title, text, timestamp) VALUES(null, '$nickname', '$blogTitle', '$blogText', '$timestamp')";
	$preparedStatement = $PDO->prepare($sql);
	$preparedStatement->execute();
	echo "post submitted successfully";
}
else
{
	echo "you shouldn't be here, this is for admins only";
}
?>
