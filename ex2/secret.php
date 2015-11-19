<?php

$pwd = NULL;

if (isset($_POST['pwd']))
{
	$pwd = $_POST['pwd'];
}

if (!isset($pwd) && htmlspecialchars($pwd) != 'whale')
{
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Restricted access - PHP Tutorial</title>
	</head>
	
	<body>
		<form method="POST" action="secret.php">
			<label for="pwd">Please, enter password:</label>
			<br/>
			<input type="password" id="pwd" name="pwd"/>
			<br/>
			<input type="submit"/>
		</form>
	</body>
</html>

<?php
}
elseif (isset($pwd) && $pwd != 'whale')
{
	echo 'Wrong password, try again! <br/>'.
		'<a href="secret.php">Enter password</a>';
}
else
{
	echo 'Welcome to this restricted area. <br/>' .
	'The secret message is: CONGRATULATIONS!';
}

?>

