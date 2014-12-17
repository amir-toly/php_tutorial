<?php

include '../models/edit_post.php';
include 'edit_validation.php';

$title = $_POST['title'];
$content = $_POST['content'];
$post_id = (int) $_POST['post_id'];

if ($error_msg = validate($title, $content))
{
	include '../views/edit_post_error.php';
	exit;
}
else
{
	if (update_post($title, $content, $post_id) === 1)
		header('Location: ../../controllers/blog/comments.php?post_id=' . $post_id);
}

//TODO(should not display a "not found" error when there are no changes)
include '../../views/404.php'; // If no posts have been updated, display error page

?>

