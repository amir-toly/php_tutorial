<?php

include '../../db.php';

function count_identical_nicknames($nickname)
{
	global $db;
	
	//TODO(check unique constraint instead)
	$count_identical_nicknames = $db->prepare(
		'SELECT COUNT(*) AS nb_identical_nicknames ' .
		'FROM members ' .
		'WHERE nickname = :nickname'
	);
	$count_identical_nicknames->execute(array(
		'nickname' => $nickname
	));
	
	$nb_identical_nicknames = $count_identical_nicknames->fetch();
	
	$count_identical_nicknames->closeCursor();
	
	return $nb_identical_nicknames['nb_identical_nicknames'];
}

function insert_member($nickname, $pwd, $email)
{
	global $db;
	
	$insert_member = $db->prepare(
		'INSERT INTO members(nickname, password, email, joined_at) '.
		'VALUES(:nickname, :password, :email, NOW())'
	);
	$insert_member->execute(array(
		'nickname' => $nickname,
		'password' => sha1($pwd),
		'email' => $email
	));
	
	$nb_inserted_members = $insert_member->rowCount();
	
	$insert_member->closeCursor();
	
	return $nb_inserted_members;
}

?>
