<?php

include 'db.php';

function display_pagination() {
	global $page, $nb_pages;
	
	echo '<p>Page';
	
	for ($i = 1; $i < $nb_pages; $i++)
	{
		if ($i !== $page)
			echo ' <a href="index.php?page=' . $i . '">' . $i . '</a>';
		else
			echo ' ' . $i;
	}
	
	echo '</p>';
}

define('NB_POSTS_PER_PAGE', 5);

$page = (int) $_GET['page'];

if ($page === 0)
	$page++;

// Get the number of posts
$response = $db->query('SELECT COUNT(*) AS nb_posts FROM posts');
$data = $response->fetch();
$nb_posts = $data['nb_posts'];

$response->closeCursor();

// Get the number of pages
$remainder = $nb_posts % NB_POSTS_PER_PAGE;
$nb_pages = $nb_posts / NB_POSTS_PER_PAGE + ($remainder > 0 ? 1 : 0);

$offset = ($page - 1) * NB_POSTS_PER_PAGE;

$query = $db->prepare("" .
	"SELECT title, id, content, DATE_FORMAT(created_at, '%d/%m/%Y at %Hh%imin%ss') AS created_at_french_fashion " .
	"FROM posts " .
	"ORDER BY created_at DESC " .
	"LIMIT :offset, 5"
);
$query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->execute();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>My awesome blog!</title>
		<meta charset="utf8" />
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	
	<body>
		<p class="align-right">
			<a href="admin">Admin section</a>
		</p>
		
		<h1>My awesome blog!</h1>
		<?php display_pagination(); ?>
		
		<?php
		
		while ($data = $query->fetch())
		{
		
		?>
			<div class="news">
				<h3>
					<?php echo htmlspecialchars($data['title']); ?>
					<em>on (french fashion display) <?php echo $data['created_at_french_fashion']; ?></em>
				</h3>
				<p>
					<?php echo nl2br(htmlspecialchars($data['content'])); ?>
					<br/>
					<a href="comments.php?post_id=<?php echo $data['id']; ?>"><em>Comments</em></a>
				</p>
			</div>
		<?php
		
		}
		
		$query->closeCursor();
		
		display_pagination();
		
		?>
	</body>
</html>

