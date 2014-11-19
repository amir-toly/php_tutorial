<?php

include '../db.php';
include 'edit_validation.php';

$title = $_POST['title'];
$content = $_POST['content'];

if ($error_msg = validate($title, $content))
{
	echo $error_msg . ' <a href="add.php">Try again</a>';
	return;
}
else
{
	$insert_post = $db->prepare(
		'INSERT INTO posts(title, content, created_at) ' .
		'VALUES(:title, :content, NOW())'
	);
	$insert_post->execute(array(
		'title' => $title,
		'content' => $content
	));
	$insert_post->closeCursor();
	
	if ($post_id = $db->lastInsertid())
		header('Location: ../comments.php?post_id=' . $post_id);
}

include '../404.php'; // If no posts have been inserted, display error page

?>

