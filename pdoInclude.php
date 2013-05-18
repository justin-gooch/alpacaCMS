<?php
//try statement to test sql error....
try {
	//uses pdo to connect to db, 
	$database_connect = 'mysql:host=localhost;dbname=dbName';
	$PDO = new PDO($database_connect, 'dbusername', 'dbPassword');
	}
catch(PDOException $e)
{
		echo "Mysql Connection Error, please refresh the page";
}
?>
