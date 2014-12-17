<?php

include '../../models/db.php';

$post_id = $_GET['post_id'];

function get_post($post_id)
{
	global $db;
	
	$get_post = $db->prepare(
		"SELECT title, content, DATE_FORMAT(created_at, '%d/%m/%Y at %Hh%imin%ss') AS created_at " .
		"FROM posts " .
		"WHERE id = :post_id"
	);
	$get_post->execute(array(
		'post_id' => $post_id
	));
	
	$post = $get_post->fetch();
	
	$get_post->closeCursor();
	
	return $post;
}

function get_comments_from_post($post_id)
{
	global $db;
	
	$get_comments_from_post = $db->prepare(
		"SELECT author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y at %Hh%imin%ss') AS comment_date_french_fashion " .
		"FROM comments " .
		"WHERE post_id = :post_id " .
		"ORDER BY comment_date"
	);
	$get_comments_from_post->execute(array(
		'post_id' => $post_id
	));
	
	$comments = $get_comments_from_post->fetchAll();
	
	$get_comments_from_post->closeCursor();
	
	return $comments;
}

?>
