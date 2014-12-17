<?php

include '../../models/db.php';

function get_pwd($nickname)
{
	global $db;
	
	$get_pwd = $db->prepare(
		'SELECT password ' .
		'FROM members ' .
		'WHERE nickname = :nickname'
	);
	$get_pwd->execute(array(
		'nickname' => $nickname
	));
	
	$hashed_pwd = $get_pwd->fetch();
	
	$get_pwd->closeCursor();
	
	return $hashed_pwd['password'];
}

?>
