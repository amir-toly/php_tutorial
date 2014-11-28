<?php

include 'db.php';

$nickname = $_POST['nickname'];
$pwd = $_POST['pwd'];
$pwd_again = $_POST['pwd_again'];
$email = $_POST['email'];

function display_error($msg)
{
	echo $msg . '<br/>' . '<a href="signup.php">Try again!</a>';
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
	
	//TODO(check unique constraint instead)
	$count_identical_nicknames = $db->prepare(
		'SELECT COUNT(*) AS nb_identical_nicknames ' .
		'FROM members ' .
		'WHERE nickname = :nickname'
	);
	$count_identical_nicknames->execute(array(
		'nickname' => $nickname
	));
	
	$nb_identical_nicknames = $count_identical_nicknames->fetch();
	
	$count_identical_nicknames->closeCursor();
	
	if ($nb_identical_nicknames['nb_identical_nicknames'] > 0)
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
	
	$insert_member = $db->prepare(
		'INSERT INTO members(nickname, password, email, joined_at) '.
		'VALUES(:nickname, :password, :email, NOW())'
	);
	$insert_member->execute(array(
		'nickname' => $nickname,
		'password' => sha1($pwd),
		'email' => $email
	));
	
	$nb_inserted_members = $insert_member->rowCount();
	
	$insert_member->closeCursor();
	
	if ($nb_inserted_members === 1)
	{
		echo 'Welcome <strong>' . $nickname . '!</strong><br/>';
		echo '<a href="index.php">Go to our Home Page</a>';
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

