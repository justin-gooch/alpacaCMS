<?php 
session_start();
$userPermission = $_SESSION['permission'];

//if the user is an admin or council person...
if($userPermission > 3)
{
	echo "<h1 class='offset3'>New Blog Post</h1><textarea rows ='2' id='blogTitle' class='offset3'></textarea><textarea rows='7' id='blogText' class='offset3'></textarea><button class='offset4' id='submitBlogPost'>Submit Blog Post</button>";
}
else
{
	echo "you do not have permission to view this page, if you clicked a link to get here, please tell us";
}
?>
	
	
