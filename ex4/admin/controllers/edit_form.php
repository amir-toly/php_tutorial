<?php

if (!isset($post))
{
	$post = array('title' => '', 'content' => '');
}

$post['title'] = htmlspecialchars($post['title']);
$post['content'] = htmlspecialchars($post['content']);

include '../views/edit_form.php';

?>
