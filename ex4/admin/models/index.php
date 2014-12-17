<?php

include '../../models/db.php';

function list_posts()
{
	global $db;
	
	$list_posts = $db->query('SELECT * FROM posts');
	
	$posts = $list_posts->fetchAll();
	
	$list_posts->closeCursor();
	
	return $posts;
}

?>
