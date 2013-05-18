<?php
session_start();
include 'pdoInclude.php';

if ($_POST['action'] == 'login') 
{
    $options = array(
        CURLOPT_URL => 'https://verifier.login.persona.org/verify',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => 2,
        CURLOPT_POSTFIELDS => 'assertion='.$_POST['assertion'].
            '&audience='.urlencode('http://'.$_SERVER['HTTP_HOST'])
    );
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $result = json_decode(curl_exec($ch), true);
    curl_close($ch);
    if ($result['status'] === 'okay') 
    {
        $_SESSION['logged'] = true;
        $_SESSION['email'] = $result['email'];
        //checks to see if user exists
        $email = $_SESSION['email'];
        
        $sql = "SELECT *
		FROM `members`
		WHERE `email` = '$email'";
        $preparedStatement = $PDO->prepare($sql);
        $preparedStatement->execute();
        $emailMatchCount = $preparedStatement->rowCount();
        
        if($emailMatchCount < 1)
        {
			$sql = "INSERT INTO `ozxdkv2g_sswash`.`members` (
			`id` ,
			`email` ,
			`nickname`, `permission`
			)
			VALUES (
			NULL , '$email', 'changeMe', '0'
			);";
			error_log($sql);

			//prepare statement
			$prepared_insert_statement = $PDO->prepare($sql);
			$prepared_insert_statement->execute();
		}
		else
		{
			//get permission of user. 
			$result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
			$permissionArray = array();
			$nicknameArray = array();
			$idArray = array();
			foreach($result as $row)
			{
				array_push($permissionArray, $row['permission']);
				array_push($nicknameArray, $row['nickname']);
				array_push($idArray, $row['id']);
				
			}
			$_SESSION['permission'] = $permissionArray[0];
			$_SESSION['nickname'] = $nicknameArray[0];
			$_SESSION['userId'] = $idArray[0];
			
		}
				
			
    }
} 
else if ($_POST['action'] == 'logout') 
{
    unset($_SESSION['logged']);
}

	
