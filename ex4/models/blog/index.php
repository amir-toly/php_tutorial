<?php

include '../../models/db.php';

function check_cookies($member_nickname, $member_pwd) {
	global $db;
	
	$check_cookies = $db->prepare(
		'SELECT nickname ' .
		'FROM members ' .
		'WHERE nickname = :nickname AND password = :password'
	);
	$check_cookies->execute(array(
		'nickname' => $member_nickname,
		'password' => $member_pwd
	));
	
	$nickname = $check_cookies->fetch();
	
	$check_cookies->closeCursor();
	
	return $nickname['nickname'];
}

function get_nb_posts() {
	global $db;
	
	$get_nb_posts = $db->query('SELECT COUNT(*) AS nb_posts FROM posts');
	
	$nb_posts = $get_nb_posts->fetch();
	
	$get_nb_posts->closeCursor();
	
	return $nb_posts['nb_posts'];
}

function get_posts($offset) {
	global $db;
	
	$get_posts = $db->prepare("" .
		"SELECT title, id, content, DATE_FORMAT(created_at, '%d/%m/%Y at %Hh%imin%ss') AS created_at_french_fashion " .
		"FROM posts " .
		"ORDER BY created_at DESC " .
		"LIMIT :offset, 5"
	);
	$get_posts->bindParam(':offset', $offset, PDO::PARAM_INT);
	$get_posts->execute();
	
	$posts = $get_posts->fetchAll();
	
	$get_posts->closeCursor();
	
	return $posts;
}

?>
