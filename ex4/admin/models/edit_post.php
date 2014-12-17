<?php

include '../../models/db.php';

function update_post($title, $content, $post_id)
{
	global $db;
	
	$update_post = $db->prepare(
		'UPDATE posts ' .
		'SET title = :title, content = :content ' .
		'WHERE id = :post_id'
	);
	$update_post->execute(array(
		'title' => $title,
		'content' => $content,
		'post_id' => $post_id
	));
	
	$nb_updated_posts = $update_post->rowCount();
	
	$update_post->closeCursor();
	
	return $nb_updated_posts;
}

?>
