<?php

include '../db.php';
include 'edit_validation.php';

$title = $_POST['title'];
$content = $_POST['content'];
$post_id = (int) $_POST['post_id'];

if ($error_msg = validate($title, $content))
{
	echo $error_msg . ' <a href="edit.php?post_id=' . $post_id . '">Try again</a>';
	return;
}
else
{
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
	
	if ($nb_updated_posts === 1)
		header('Location: ../comments.php?post_id=' . $post_id);
}

//TODO(should not display a "not found" error when there are no changes)
include '../404.php'; // If no posts have been updated, display error page

?>

