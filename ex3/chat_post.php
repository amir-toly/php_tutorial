<?php

try
{
	$db = new PDO(
		'mysql:host=localhost;dbname=test;',
		'root',
		'',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
	);
}
catch (Exception $e)
{
	die('ERROR: ' . $e->getMessage());
}

$nickname = $_POST['nickname'];
$message = $_POST['message'];

if (isset($nickname) && isset($message))
{
	if (strlen($nickname) > 0 && strlen($message) > 0)
	{
		$query = $db->prepare(
			'INSERT INTO chat(nickname, message) VALUES(:nickname, :message)'
		);
		
		$query->execute(array(
			'nickname' => $nickname,
			'message' => $message
		));
		
		$query->closeCursor();
	}
	else
	{
		echo '<p>You must provide a nickname AND a message!</p>';
		echo '<a href="chat.php">Back</a>';
		
		return; // Avoid header() call
	}
}

header('Location: chat.php');

?>

