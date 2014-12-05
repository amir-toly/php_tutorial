<?php

session_start();
session_destroy();

setcookie('member_nickname', null);
setcookie('member_pwd', null);

header('Location: ../../index.php');

?>

