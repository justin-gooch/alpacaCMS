<?php 
session_start();
$userPermission = $_SESSION['permission'];

//if the user is an admin or council person...
if($userPermission > 3)
{
	echo "<h1 class='offset3'>New Blog Post</h1><textarea placeholder='Title' rows ='2' id='blogTitle' class='offset3 span3'></textarea><br><textarea rows='7' placeholder='Blog Text' id='blogText' class='offset3 span3'></textarea><br><button class='offset3' id='submitBlogPost'>Submit Blog Post</button>";
}
else
{
	echo "you do not have permission to view this page, if you clicked a link to get here, please tell us";
}
?>
	
	
