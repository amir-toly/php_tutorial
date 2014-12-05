<?php

include '../../models/blog/login_post.php';

session_start();

$from = $_POST['from'];
$nickname = $_POST['nickname'];
$pwd = $_POST['pwd'];

$hashed_pwd = get_pwd($nickname);

if (crypt($pwd, $hashed_pwd) === $hashed_pwd)
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
	include '../../views/blog/login_post_error.php';
}

?>

