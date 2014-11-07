<?php

try
{
	$db = new PDO(
		'mysql:host=localhost;dbname=test',
		'root',
		'',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
	);
}
catch (Exception $e)
{
	die('ERROR: ' . $e->getMessage());
}

?>
