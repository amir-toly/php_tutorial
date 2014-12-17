<?php

include '../../models/blog/comments_post.php';

$author = $_POST['author'];
$comment = $_POST['comment'];
$post_id = (int) $_POST['post_id'];//TODO(check that the post_id exists in order to avoid orphan comments)

if (!(
	isset($author) &&
	isset($comment) &&
	strlen($author) > 0 &&
	strlen($comment) > 0
))
{
	include '../../views/blog/comments_post_error.php';
	exit;
}

insert_comment($post_id, $author, $comment);

header('Location: comments.php?post_id=' . $post_id);

?>
