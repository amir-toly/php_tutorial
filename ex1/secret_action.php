<?php

$pwd = $_POST['pwd'];

if (isset($pwd))
{
	$pwd = htmlspecialchars($pwd);
	
	if ($pwd == 'whale')
	{
		echo 'Welcome to this restricted area. <br/>' .
		'The secret message is: CONGRATULATIONS!';
	}
	else
	{
		echo 'Wrong password, try again! <br/>'.
		'<a href="secret.php">Enter password</a>';
	}
}
else
{
	echo 'Password required';
}

?>

