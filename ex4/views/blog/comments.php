<!DOCTYPE html>
<html>
	<head>
		<title>My awesome blog!</title>
		<meta charset="utf8" />
		<link rel="stylesheet" href="../../views/blog/style.css" type="text/css" />
	</head>
	
	<body>
		<h1>My awesome blog!</h1>
		<a href="index.php">Back to posts list</a>
		
		<div class="news">
			<h3>
				<?php echo $post['title']; ?>
				<em> on (french fashion display) <?php echo $post['created_at']; ?></em>
			</h3>
			<p><?php echo $post['content']; ?></p>
		</div>
		
		<h2>Comments</h2>
		
		<form method="post" action="comments_post.php">
			<fieldset>
				<legend>Add a comment</legend>
				
				<p>
					<label for="author">Author:</label>
					<br/>
					<input type="text" id="author" name="author" />
				</p>
				<p>
					<label for="comment">Comment:</label>
					<br/>
					<textarea id="comment" name="comment"></textarea>
				</p>
				
				<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
				
				<input type="submit" value="Send" />
			</fieldset>
		</form>
		
		<?php
		
		if (count($comments) > 0)
		{
			foreach($comments as $comment) {
				
		?>
				<p>
					<strong><?php echo $comment['author']; ?></strong>
					on (french fashion display) <?php echo $comment['comment_date_french_fashion']; ?>
				</p>
				<p><?php echo $comment['comment']; ?></p>
		<?php
			
			}
		} else {
			echo '<p><em>No comments for this post</em></p>';
		}
		
		?>
	</body>
</html>

