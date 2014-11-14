<?php

include '../db.php';

$post_id = $_GET['post_id'];

if (isset($post_id))
{
	$post_id = (int) $post_id;
	
	//TODO(add constraint on foreign key)
	$remove_comments_from_post = $db->prepare('DELETE FROM comments WHERE post_id = :post_id');
	$remove_comments_from_post->execute(array(
		'post_id' => $post_id
	));
	$remove_comments_from_post->closeCursor();
	
	$remove_post = $db->prepare('DELETE FROM posts WHERE id = :post_id');
	$remove_post->execute(array(
		'post_id' => $post_id
	));
	
	$nb_deleted_posts = $remove_post->rowCount();
	
	$remove_post->closeCursor();
	
	if ($nb_deleted_posts === 1)
		header('Location: .');
}

include "../404.php"; // If no posts have been deleted, display error page

?>

