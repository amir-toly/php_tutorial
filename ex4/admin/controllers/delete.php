<?php

include '../models/delete.php';

$post_id = $_GET['post_id'];

if (isset($post_id))
{
	$post_id = (int) $post_id;
	
	remove_comments_from_post($post_id);
	
	if (remove_post($post_id) === 1)
		header('Location: .');
}

include '../../views/404.php'; // If no posts have been deleted, display error page

?>

