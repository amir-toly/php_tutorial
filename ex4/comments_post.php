<?php

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
	echo 'Author and comment required! <a href="comments.php?post_id=' . $post_id . '">Try again</a>';
	return;
}

include 'db.php';

$insert_comment = $db->prepare(
	'INSERT INTO comments(post_id, author, comment, comment_date)' .
	'VALUES(:post_id, :author, :comment, NOW())'
);

$insert_comment->execute(array(
	'post_id' => $post_id,
	'author' => $author,
	'comment' => $comment
));

$insert_comment->closeCursor();

header('Location: comments.php?post_id=' . $post_id);

?>

