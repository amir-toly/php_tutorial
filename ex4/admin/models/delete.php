<?php

include '../../models/db.php';

function remove_comments_from_post($post_id)
{
	global $db;
	
	//TODO(add constraint on foreign key)
	$remove_comments_from_post = $db->prepare('DELETE FROM comments WHERE post_id = :post_id');
	$remove_comments_from_post->execute(array(
		'post_id' => $post_id
	));
	$remove_comments_from_post->closeCursor();
}

function remove_post($post_id)
{
	global $db;
	
	$remove_post = $db->prepare('DELETE FROM posts WHERE id = :post_id');
	$remove_post->execute(array(
		'post_id' => $post_id
	));
	
	$nb_deleted_posts = $remove_post->rowCount();
	
	$remove_post->closeCursor();
	
	return $nb_deleted_posts;
}

?>
