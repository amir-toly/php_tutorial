<?php

include 'db.php';

$response = $db->query("" .
	"SELECT title, id, content, DATE_FORMAT(created_at, '%d/%m/%Y at %Hh%imin%ss') AS created_at_french_fashion " .
	"FROM posts " .
	"ORDER BY created_at DESC " .
	"LIMIT 0, 5"
);

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
		<p>Last blog posts:</p>
		
		<?php while ($data = $response->fetch()) { ?>
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
		<?php } ?>
	</body>
</html>

<?php

$response->closeCursor();

?>

