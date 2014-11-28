<?php

$title = 'Logging In';
$from = $_GET['from'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf8" />
	</head>
	
	<body>
		<h1><?php echo $title; ?></h1>
		
		<form method="post" action="login_post.php">
			<input type="hidden" name="from" value="<?php echo $from; ?>" />
			
			<label for="nickname">Nickname:</label>
			<br/>
			<input type="text" id="nickname" name="nickname" />
			<br/>
			<label for="pwd">Password:</label>
			<br/>
			<input type="password" id="pwd" name="pwd" />
			<br/>
			<label for="stay_connected">Stay connected?</label>
			<br/>
			<input type="checkbox" id="stay_connected" name="stay_connected" />
			<br/>
			<input type="submit" value="Log in" />
		</form>
	</body>
</html>

