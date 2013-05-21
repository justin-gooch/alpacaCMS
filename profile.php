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
	$aboutMe = $row['aboutMe']
}
if($permission == 0)
{
	//prompt to change nickname.
	echo "<textarea id='nickname' placeholder='nickname'></textarea><br><br><textarea id='aboutMe' placeholder='About Me'></textarea><br><br><button id='updateProfileNickname'>Update Profile</button>";
}
else
{
	//promp to update profile.
	echo "<textarea id='aboutMe' placeholder='About Me'></textarea><br><br><button id='updateProfile'>Update Profile</button>";
}

?>


