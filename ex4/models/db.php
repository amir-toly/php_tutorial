<?php

try
{
	$db = new PDO(
		'mysql:host=localhost;dbname=sdz',
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
