<?php

try
{
	$db = new PDO(
		'mysql:host=localhost;dbname=test',
		'root',
		'',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
	);
}
catch (Exception $e)
{
	die('ERROR: ' . $e->getMessage());
}

$post_id = $_GET['post_id'];

if (isset($post_id))
{
	$post_id = intval($post_id);
	
	$query = $db->prepare(
		"SELECT title, content, DATE_FORMAT(created_at, '%d/%m/%Y at %Hh%imin%ss') AS created_at " .
		"FROM posts " .
		"WHERE id = :post_id"
	);
	$query->execute(array(
		'post_id' => $post_id
	));
	
	$post = $query->fetch();
	
	$query->closeCursor();
	
	$query = $db->prepare(
		"SELECT author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y at %Hh%imin%ss') AS comment_date " .
		"FROM comments " .
		"WHERE post_id = :post_id " .
		"ORDER BY comment_date"
	);
	
	$query->execute(array(
		'post_id' => $post_id
	));
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>My awesome blog!</title>
		<meta charset="utf8" />
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	
	<body>
		<h1>My awesome blog!</h1>
		<a href="index.php">Back to posts list</a>
		
		<div class="news">
			<h3>
				<?php echo $post['title']; ?>
				<em> on (french fashion display) <?php echo $post['created_at']; ?></em>
			</h3>
			<p><?php echo nl2br($post['content']); ?></p>
		</div>
		
		<h2>Comments</h2>
		<?php
		
		if ($query->rowCount() > 0)
		{
			while ($data = $query->fetch()) {
				
		?>
				<p>
					<strong><?php echo $data['author']; ?></strong>
					on (french fashion display) <?php echo $data['comment_date']; ?>
				</p>
				<p><?php echo nl2br($data['comment']); ?></p>
		<?php
			
			}
		} else {
			echo '<p><em>No comments for this post</em></p>';
		}
		
		?>
	</body>
</html>

<?php

$query->closeCursor();

?>

