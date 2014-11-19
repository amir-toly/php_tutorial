<?php

include '../db.php';

$post_id = $_GET['post_id'];

if (isset($post_id))
{
	$post_id = (int) $post_id;
	
	$get_post = $db->prepare('SELECT * FROM posts WHERE id = :post_id');
	$get_post->execute(array(
		'post_id' => $post_id
	));
	
	$post = $get_post->fetch();
	
	$get_post->closeCursor();
	
	if (empty($post))
	{
		include '../404.php';
		return;
	}
	
	$title = 'Admin - Edit post';
	$form_action = 'edit_post.php';
}
else
{
	header('Location: index.php');
}

include 'edit_form.php';

?>

