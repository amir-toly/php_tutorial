<?php

include 'db.php';

session_start();

$from = $_POST['from'];
$nickname = $_POST['nickname'];
$pwd = $_POST['pwd'];

$get_pwd = $db->prepare(
	'SELECT password ' .
	'FROM members ' .
	'WHERE nickname = :nickname'
);
$get_pwd->execute(array(
	'nickname' => $nickname
));

$hashed_pwd = $get_pwd->fetch();

$get_pwd->closeCursor();

$hashed_pwd = $hashed_pwd['password'];

if (sha1($pwd) === $hashed_pwd)
{
	if ($_POST['stay_connected'])
	{
		setcookie('member_nickname', $nickname, time() + 365 * 24 * 3600, null, null, null, true);
		setcookie('member_pwd', $hashed_pwd, time() + 365 * 24 * 3600, null, null, null, true);
	}
	
	$_SESSION['connected_member_nickname'] = $nickname;
	header('Location: ' . $from);
}
else
{
	echo "Your nickname doesn't match the given password." . '<br/>';
	echo '<a href="login.php?from=' . $from . '">Try again</a>';
}

?>

