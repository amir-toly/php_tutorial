<?php

include '../models/index.php';

$posts = list_posts();

foreach($posts as $key => $post)
{
	$posts[$key]['title'] = htmlspecialchars($post['title']);
}

$title = 'Admin - Posts list';

include '../views/index.php';

?>
