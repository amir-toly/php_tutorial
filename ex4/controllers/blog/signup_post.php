<?php

include '../../models/blog/signup_post.php';

$nickname = $_POST['nickname'];
$pwd = $_POST['pwd'];
$pwd_again = $_POST['pwd_again'];
$email = $_POST['email'];

function display_error($msg)
{
	include '../../views/blog/signup_post_error.php';
	exit;
}

if (
	isset($nickname) &&
	isset($pwd) &&
	isset($pwd_again) &&
	isset($email)
)
{
	if (strlen($nickname) === 0)
	{
		display_error('Nickname required.');
	}
	if (strlen($pwd) === 0)
	{
		display_error('Password required.');
	}
	
	if (count_identical_nicknames($nickname) > 0)
	{
		display_error(
			'Another member is already using the nickname ' .
			'<strong>' . $nickname . '</strong>. Please choose another one.'
		);
	}
	
	if ($pwd !== $pwd_again)
	{
		display_error('The two passwords are not identical.');
	}
	
	//TODO(replace by official email format specification)
	if (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$#i', $email))
	{
		display_error('Email format is invalid.');
	}
	
	if (insert_member($nickname, crypt($pwd), $email) === 1)
	{
		include '../../views/blog/signup_post_success.php';
	}
	else
	{
		display_error(
			"We haven't been able to register you. " .
			"We are sorry for the inconvenience."
		);
	}
}
else
{
	header('Location: signup.php');
}

?>

