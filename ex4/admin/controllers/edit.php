<?php

include '../models/edit.php';

$post_id = $_GET['post_id'];

if (isset($post_id))
{
	$post_id = (int) $post_id;
	$post = get_post($post_id);
	
	if (empty($post))
	{
		include '../../views/404.php';
		exit;
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

