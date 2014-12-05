<?php

session_start();

$_SESSION = array();

session_destroy();

setcookie('member_nickname', null);
setcookie('member_pwd', null);

header('Location: ../../index.php');

?>

