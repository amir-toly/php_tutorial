<!DOCTYPE httml>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf8" />
	</head>
	
	<body>
		<h1><?php echo $title; ?></h1>
		
		<form method="post" action="signup_post.php">
			<label for="nickname">Nickname:</label>
			<br/>
			<input type="text" id="nickname" name="nickname" />
			<br/>
			<label for="pwd">Password:</label>
			<br/>
			<input type="password" id="pwd" name="pwd" />
			<br/>
			<label for="pwd_again">Type again your password:</label>
			<br/>
			<input type="password" id="pwd_again" name="pwd_again" />
			<br/>
			<label for="email">Email:</label>
			<br/>
			<input type="text" id="email" name="email" />
			<br/>
			
			<input type="submit" value="Sign up" />
		</form>
	</body>
</html>

