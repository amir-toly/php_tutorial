<?php

include '../../models/blog/comments.php';

$post_id = $_GET['post_id'];

if (isset($post_id))
{
	$post_id = intval($post_id);
	
	$post = get_post($post_id);
	
	if (empty($post))
	{
		include '../../views/404.php';
		exit;
	}
	
	$post['title'] = htmlspecialchars($post['title']);
	$post['content'] = nl2br(htmlspecialchars($post['content']));
	
	$comments = get_comments_from_post($post_id);
	
	foreach($comments as $key => $comment)
	{
		$comments[$key]['author'] = htmlspecialchars($comment['author']);
		$comments[$key]['comment'] = nl2br(htmlspecialchars($comment['comment']));
	}
	
	include '../../views/blog/comments.php';
}

?>
