<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf8" />
	</head>
	
	<body>
		<h1><?php echo $title; ?></h1>
		
		<form method="post" action="<?php echo $form_action; ?>">
			<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
			Title:
			<br/>
			<input type="text" name="title" value="<?php echo $post['title']; ?>" size="50" />
			<br/>
			Content:
			<br/>
			<textarea name="content" rows="5" cols="100"><?php echo $post['content']; ?></textarea>
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

