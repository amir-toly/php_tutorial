<?php

include '../db.php';

$post_id = $_GET['post_id'];

if (isset($post_id))
{
	$post_id = (int) $post_id;
	
	$get_post = $db->prepare('SELECT * FROM posts WHERE id = :post_id');
	$get_post->execute(array(
		'post_id' => $post_id
	));
	
	$post = $get_post->fetch();
	
	$get_post->closeCursor();
	
	if (empty($post))
	{
		include '../404.php';
		return;
	}
	
	$title = 'Admin - Edit post';
}
else
{
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf8" />
	</head>
	
	<body>
		<h1><?php echo $title; ?></h1>
		
		<form method="post" action="edit_post.php">
			<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
			Title:
			<br/>
			<input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" size="50" />
			<br/>
			Content:
			<br/>
			<textarea name="content" rows="5" cols="100"><?php echo htmlspecialchars($post['content']); ?></textarea>
			<br/>
			<input type="button" value="Cancel" onclick="goToAdminHomePage()" />
			<input type="submit" value="Save" />
		</form>
	</body>
	
	<script>
	
	function goToAdminHomePage() {
		location.href = '.';
	}
	
	</script>
</html>

