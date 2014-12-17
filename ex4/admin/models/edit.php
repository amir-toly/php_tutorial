<?php

include '../../models/db.php';

function get_post($post_id)
{
	global $db;
	
	$get_post = $db->prepare('SELECT * FROM posts WHERE id = :post_id');
	$get_post->execute(array(
		'post_id' => $post_id
	));
	
	$post = $get_post->fetch();
	
	$get_post->closeCursor();
	
	return $post;
}

?>
