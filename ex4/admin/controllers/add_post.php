<?php

include '../models/add_post.php';
include 'edit_validation.php';

$title = $_POST['title'];
$content = $_POST['content'];

if ($error_msg = validate($title, $content))
{
	include '../views/add_post_error.php';
	exit;
}
else
{
	if ($post_id = insert_post($title, $content))
		header('Location: ../../controllers/blog/comments.php?post_id=' . $post_id);
}

include '../../views/404.php'; // If no posts have been inserted, display error page

?>

