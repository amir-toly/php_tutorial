<?php

include '../db.php';

$posts = $db->query('SELECT * FROM posts');
$title = 'Admin - Posts list';

?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf8" />
		<link rel="stylesheet" type="text/css" href="../style.css" />
	</head>
	
	<body>
		<h1><?php echo $title; ?></h1>
		<a href="#">Add a new post</a>
		
		<ul class="no-decoration">
			<?php while ($post = $posts->fetch()) { ?>
				<li>
					<!--TODO(how to put "return false;" in a function?)-->
					<form method="get" action="delete.php" onsubmit="confirmDeletion(this); return false;">
						<input type="hidden" name="post_id" value="<?php echo $post['id']; ?>" />
						<input type="submit" value="Delete" />
						<a href="edit.php?post_id=<?php echo $post['id']; ?>">
							<?php echo $post['title']; ?>
						</a>
					</form>
				</li>
			<?php } ?>
		</ul>
	</body>
	<script>
	
	function confirmDeletion(thisParam) {
		if(confirm('Are you sure?'))
			thisParam.submit();
	}
	
	</script>
</html>

<?php

$posts->closeCursor();

?>

