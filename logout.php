<?php
session_start();
unset($_COOKIE['user_name']);
setcookie('user_name', null, -1, '/');
session_destroy();
header("Location: loginPage.php");
exit;
