<?php

include '../../models/db.php';

function insert_post($title, $content)
{
	global $db;
	
	$insert_post = $db->prepare(
		'INSERT INTO posts(title, content, created_at) ' .
		'VALUES(:title, :content, NOW())'
	);
	$insert_post->execute(array(
		'title' => $title,
		'content' => $content
	));
	$insert_post->closeCursor();
	
	return $db->lastInsertId();
}

?>
