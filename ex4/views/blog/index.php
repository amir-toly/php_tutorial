<!DOCTYPE html>
<html>
	<head>
		<title>My awesome blog!</title>
		<meta charset="utf8" />
		<link rel="stylesheet" href="../../views/blog/style.css" type="text/css" />
	</head>
	
	<body>
		<p>
			<?php if ($connected_member_nickname) { ?>
				Connected as <em><?php echo $connected_member_nickname; ?></em> | <a href="../../controllers/blog/logout.php">Log out</a>
			<?php } else { ?>
				<a href="../../controllers/blog/login.php?from=<?php echo $_SERVER['PHP_SELF']; ?>">Log in</a> | <a href="../../controllers/blog/signup.php">Sign up</a>
			<?php } ?>
			<a class="float-right" href="../../admin/controllers/index.php">Admin section</a>
		</p>
		
		<h1>My awesome blog!</h1>
		<?php display_pagination(); ?>
		
		<?php
		
		foreach ($posts as $post)
		{
		
		?>
			<div class="news">
				<h3>
					<?php echo $post['title']; ?>
					<em>on (french fashion display) <?php echo $post['created_at_french_fashion']; ?></em>
				</h3>
				<p>
					<?php echo $post['content']; ?>
					<br/>
					<a href="comments.php?post_id=<?php echo $post['id']; ?>"><em>Comments</em></a>
				</p>
			</div>
		<?php
		
		}
		
		display_pagination();
		
		?>
	</body>
</html>

