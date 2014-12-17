<?php

include '../../models/db.php';

function insert_comment($post_id, $author, $comment)
{
	global $db;
	
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
}

?>
