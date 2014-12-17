<?php

$post['title'] = htmlspecialchars($post['title']);
$post['content'] = htmlspecialchars($post['content']);

include '../views/edit_form.php';

?>
