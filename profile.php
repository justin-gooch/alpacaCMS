<?php 
session_start();
include_once "pdoInclude.php";

$userId = $_SESSION['userId'];

$sql = "SELECT * FROM `members` WHERE `id` = '$userId'";
$preparedStatement = $PDO->prepare($sql);
$preparedStatement->execute();
$result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
//get all sql rows from foreach loop
foreach($result as $row)
{
	$userId= $row['id'];
	$email = $row['email'];
	$nickname = $row['nickname'];
	$permission = $row['permission'];
	$aboutMe = $row['aboutMe'];
}
if($permission < 1)
{
	//prompt to change nickname.
	echo "<h1>Update Nickname</h1><textarea id='nickname' placeholder='nickname'></textarea><br><br><button id='updateProfile'>Update Profile</button>";
}
else
{
	//promp to update profile.
	echo "Your nickname is " . $nickname . " in order to prevent abuse, please message a moderator to change your nickname";
}

?>


